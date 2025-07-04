<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Template;
use App\Models\GeneratedDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\RateLimiter;
use App\Services\WordExportService;
use Illuminate\Support\Str;

class TemplateController extends Controller
{
    // Методы index() и show() остаются без изменений...
    public function index(Request $request)
    {
        $searchQuery = $request->input('q');
        $popularTemplateIds = GeneratedDocument::query()->select('template_id', DB::raw('count(*) as count'))->groupBy('template_id')->orderByDesc('count')->limit(4)->pluck('template_id');
        $popularTemplates = Template::whereIn('id', $popularTemplateIds)->with('translation')->get();
        $categories = Category::with(['templates' => function ($query) {
            $query->where('is_active', true)->with('translation');
        }])->get();
        $matchingTemplateIds = [];
        if ($searchQuery) {
            $matchingTemplateIds = Template::query()
                ->whereHas('translations', function ($translationQuery) use ($searchQuery) {
                    $translationQuery->where('title', 'like', "%{$searchQuery}%")
                        ->orWhere('description', 'like', "%{$searchQuery}%");
                })
                ->pluck('id')
                ->toArray();
        }
        return view('home', compact('categories', 'popularTemplates', 'searchQuery', 'matchingTemplateIds'));
    }

    public function show(Request $request, string $locale, Template $template)
    {
        if (!$template->is_active) {
            abort(404);
        }
        $prefillData = [];
        if ($request->has('data')) {
            $prefillData = $request->input('data', []);
        } elseif (Auth::check() && Auth::user()->details) {
            $userDetails = Auth::user()->details;
            $templateFields = $template->fields;
            foreach ($templateFields as $field) {
                $fieldName = $field['name'];
                $fieldLabel = strtolower($field['labels'][app()->getLocale()] ?? '');
                switch (true) {
                    case str_contains($fieldName, 'name'):
                        if (str_contains($fieldName, 'short') || str_contains($fieldLabel, 'ініціали') || str_contains($fieldLabel, 'inicjały')) {
                            $prefillData[$fieldName] = $userDetails->short_name;
                        } elseif (str_contains($fieldName, 'genitive') || str_contains($fieldLabel, '(в род. відмінку)') || str_contains($fieldLabel, '(dopełniacz)')) {
                            $prefillData[$fieldName] = $userDetails->full_name_genitive;
                        }
                        break;
                    case str_contains($fieldName, 'address'):
                        $prefillData[$fieldName] = $userDetails->address_factual ?? $userDetails->address_registered;
                        break;
                    case str_contains($fieldName, 'phone'):
                        $prefillData[$fieldName] = $userDetails->phone_number;
                        break;
                    case str_contains($fieldName, 'tax_id'):
                    case str_contains($fieldName, 'tin'):
                        $prefillData[$fieldName] = $userDetails->tax_id_number;
                        break;
                    default:
                        if (isset($userDetails->$fieldName)) {
                            $prefillData[$fieldName] = $userDetails->$fieldName;
                        }
                        break;
                }
            }
        }
        return view('templates.show', compact('template', 'prefillData'));
    }

    // Вспомогательный приватный метод для обработки данных
    private function processTemplateData(Template $template, array $validatedData): array
    {
        $templateFields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];
        $textareaFields = [];
        foreach ($templateFields as $field) {
            if ($field['type'] === 'textarea') {
                $textareaFields[] = $field['name'];
            }
        }

        $processedData = [];
        foreach ($validatedData as $key => $value) {
            if (in_array($key, $textareaFields)) {
                // Превращаем каждую строку в отдельный параграф <p>
                $lines = explode("\n", e($value));
                $processedValue = '';
                foreach ($lines as $line) {
                    $processedValue .= '<p style="margin: 0; padding: 0;">' . trim($line) . '</p>';
                }
                $processedData[$key] = $processedValue;
            } else {
                $processedData[$key] = e($value);
            }
        }
        return $processedData;
    }


    public function generatePdf(Request $request, string $locale, Template $template)
    {
        if (!$template->is_active) { abort(404); }
        if (!Auth::check()) {
            $executed = RateLimiter::attempt('generate-pdf:'.$request->ip(), 1, function() {});
            if (!$executed) { return back()->with('error', __('messages.rate_limit_exceeded')); }
        }
        $validatedData = $this->validateFormData($request, $template);
        if (Auth::check()) {
            GeneratedDocument::create(['user_id' => Auth::id(), 'template_id' => $template->id, 'data' => $validatedData]);
        }

        // Используем новый приватный метод для обработки данных
        $processedData = $this->processTemplateData($template, $validatedData);

        $fullHtml = ($template->header_html ?? '') . ($template->body_html ?? '') . ($template->footer_html ?? '');

        foreach ($processedData as $key => $value) {
            $fullHtml = str_replace("[[{$key}]]", $value, $fullHtml);
        }
        $fullHtml = str_replace('[[current_date]]', now()->format('d.m.Y'), $fullHtml);

        $pdf = Pdf::loadHTML($fullHtml);

        $fileName = Str::slug($template->translation->title) . '-' . time() . '.pdf';
        return $pdf->download($fileName);
    }


    public function generateDocx(Request $request, string $locale, Template $template, WordExportService $wordExportService)
    {
        $validatedData = $this->validateFormData($request, $template);

        // Используем тот же самый приватный метод для обработки данных
        $processedData = $this->processTemplateData($template, $validatedData);

        $fullHtml = ($template->header_html ?? '') . ($template->body_html ?? '') . ($template->footer_html ?? '');

        foreach ($processedData as $key => $value) {
            $fullHtml = str_replace("[[{$key}]]", $value, $fullHtml);
        }
        $fullHtml = str_replace('[[current_date]]', now()->format('d.m.Y'), $fullHtml);

        $fileName = Str::slug($template->title) . '.docx';
        return $wordExportService->generateFromHtml($fullHtml, $fileName);
    }

    private function validateFormData(Request $request, Template $template): array
    {
        $rules = [];
        $attributeNames = [];
        $locale = app()->getLocale();
        $fields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];
        foreach ($fields as $field) {
            if (isset($field['required']) && $field['required']) {
                $rules[$field['name']] = 'required';
            } else {
                $rules[$field['name']] = 'nullable';
            }
            if (isset($field['type'])) {
                if ($field['type'] === 'email') $rules[$field['name']] .= '|email';
                if ($field['type'] === 'number') $rules[$field['name']] .= '|numeric';
            }
            if(isset($field['labels']))
                $attributeNames[$field['name']] = $field['labels'][$locale] ?? $field['name'];
        }
        return $request->validate($rules, [], $attributeNames);
    }
}
