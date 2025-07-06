<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Template;
use App\Models\GeneratedDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf; // Убедитесь, что этот фасад импортирован
use Illuminate\Support\Facades\RateLimiter;
use App\Services\WordExportService;
use Illuminate\Support\Str;

// Если вы использовали 'use Dompdf\Options;' ранее, удалите ее,
// так как мы будем использовать полный путь '\Dompdf\Options' для ясности.

class TemplateController extends Controller
{
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
                // Заменяем переносы строк на <br/> для лучшей совместимости с DOCX
                $processedData[$key] = nl2br(e($value));
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

        // Получаем HTML для текущего языка
        $currentTranslation = $template->translations->where('locale', $locale)->first();
        if (!$currentTranslation) {
            // Если перевода для текущей локали нет, используем украинский как запасной
            $currentTranslation = $template->translations->where('locale', 'uk')->first();
        }

        $headerHtml = $currentTranslation->header_html ?? '';
        $bodyHtml = $currentTranslation->body_html ?? '';
        $footerHtml = $currentTranslation->footer_html ?? '';

        $fullHtml = $headerHtml . $bodyHtml . $footerHtml;

        foreach ($processedData as $key => $value) {
            $fullHtml = str_replace("[[{$key}]]", $value, $fullHtml);
        }

        // Форматируем дату в зависимости от локали
        $formattedDate = '';
        switch ($locale) {
            case 'uk':
                $formattedDate = now()->format('d.m.Y') . ' р.'; // 05.07.2025 р.
                break;
            case 'pl':
                $formattedDate = now()->format('d.m.Y'); // 05.07.2025
                break;
            case 'de':
                $formattedDate = now()->format('d.m.Y'); // 05.07.2025
                break;
            default:
                $formattedDate = now()->format('Y-m-d'); // Default for 'en' and others
                break;
        }
        $fullHtml = str_replace('[[current_date]]', $formattedDate, $fullHtml);


        // Настройка DomPDF для поддержки Unicode и шрифтов
        // Вместо создания объекта Dompdf\Options, передаем массив настроек
        $pdfOptions = [
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'DejaVu Sans', // Убедитесь, что этот шрифт доступен
            'unicodeEnabled' => true, // КЛЮЧЕВОЙ ПАРАМЕТР
            'enable_font_subsetting' => false, // Отключить подмножество шрифтов
        ];

        // Используем setOptions() с массивом
        $pdf = Pdf::loadHTML($fullHtml)->setOptions($pdfOptions);

        // Безопасное получение заголовка для имени файла
        $fileName = Str::slug($currentTranslation->title ?? $template->slug) . '-' . time() . '.pdf';
        return $pdf->download($fileName);
    }


    public function generateDocx(Request $request, string $locale, Template $template, WordExportService $wordExportService)
    {
        $validatedData = $this->validateFormData($request, $template);

        // Используем тот же самый приватный метод для обработки данных
        $processedData = $this->processTemplateData($template, $validatedData);

        // Получаем HTML для текущего языка
        $currentTranslation = $template->translations->where('locale', $locale)->first();
        if (!$currentTranslation) {
            // Если перевода для текущей локали нет, используем украинский как запасной
            $currentTranslation = $template->translations->where('locale', 'uk')->first();
        }

        $headerHtml = $currentTranslation->header_html ?? '';
        $bodyHtml = $currentTranslation->body_html ?? '';
        $footerHtml = $currentTranslation->footer_html ?? '';

        $fullHtml = $headerHtml . $bodyHtml . $footerHtml;

        foreach ($processedData as $key => $value) {
            $fullHtml = str_replace("[[{$key}]]", $value, $fullHtml);
        }

        // Форматируем дату в зависимости от локали
        $formattedDate = '';
        switch ($locale) {
            case 'uk':
                $formattedDate = now()->format('d.m.Y') . ' р.'; // 05.07.2025 р.
                break;
            case 'pl':
                $formattedDate = now()->format('d.m.Y'); // 05.07.2025
                break;
            case 'de':
                $formattedDate = now()->format('d.m.Y'); // 05.07.2025
                break;
            default:
                $formattedDate = now()->format('Y-m-d'); // Default for 'en' and others
                break;
        }
        $fullHtml = str_replace('[[current_date]]', $formattedDate, $fullHtml);


        // Дополнительная очистка HTML для DOCX
        $fullHtml = preg_replace('/\s+/', ' ', $fullHtml); // Заменяем множественные пробелы на один
        $fullHtml = str_replace(['<p> </p>', '<p></p>'], '', $fullHtml); // Удаляем пустые параграфы

        // Безопасное получение заголовка для имени файла
        $fileName = Str::slug($currentTranslation->title ?? $template->slug) . '.docx';
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
