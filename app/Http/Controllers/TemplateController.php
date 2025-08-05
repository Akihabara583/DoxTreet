<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Template;
use App\Models\GeneratedDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\WordExportService;
use Illuminate\Support\Str;

class TemplateController extends Controller
{
    // --- Метод index остается без изменений ---
    public function index(Request $request)
    {
        $locale = app()->getLocale();
        $searchQuery = $request->query('q');

        $searchResults = null;
        $popularTemplates = collect();
        $countries = [];
        $dataByCountry = [];

        $countryNames = [
            'UA' => ['uk' => 'Україна', 'en' => 'Ukraine', 'pl' => 'Ukraina', 'de' => 'Ukraine'],
            'PL' => ['uk' => 'Польща', 'en' => 'Poland', 'pl' => 'Polska', 'de' => 'Polen'],
            'DE' => ['uk' => 'Німеччина', 'en' => 'Germany', 'pl' => 'Niemcy', 'de' => 'Deutschland'],
        ];

        if ($searchQuery) {
            $searchResults = Template::where('is_active', true)
                ->whereHas('translations', function ($query) use ($searchQuery) {
                    $query->where('title', 'LIKE', "%$searchQuery%")
                        ->orWhere('description', 'LIKE', "%$searchQuery%");
                })
                ->with('translation')
                ->get();

            if ($searchResults) {
                $searchResults->each(function ($template) use ($countryNames, $locale) {
                    $template->countryName = $countryNames[$template->country_code][$locale] ?? $template->country_code;
                });
            }

        } else {
            $popularTemplateIds = GeneratedDocument::query()->whereNotNull('template_id')->select('template_id', DB::raw('count(*) as count'))->groupBy('template_id')->orderByDesc('count')->limit(4)->pluck('template_id');
            $popularTemplates = Template::with('translation')->whereIn('id', $popularTemplateIds)->get();

            $allCategories = Category::query()
                ->whereHas('templates', fn($q) => $q->where('is_active', true))
                ->with(['templates' => function ($query) {
                    $query->where('is_active', true)->with('translation');
                }])
                ->get();

            $allCategories->each(function ($category) use ($locale) {
                $category->name = $category->getTranslation('name', $locale);
            });

            $allCategories->groupBy('country_code')->each(function ($categoriesInCountry, $countryCode) use (&$dataByCountry, $locale) {
                $dataByCountry[$countryCode] = $categoriesInCountry->map(function ($category) use ($locale) {
                    return [
                        'id' => $category->id, 'slug' => $category->slug, 'name' => $category->getTranslation('name', $locale),
                        'templates' => $category->templates->map(function ($template) {
                            return ['id' => $template->id, 'slug' => $template->slug, 'country_code' => $template->country_code, 'title' => $template->title, 'description' => $template->description];
                        })->values(),
                    ];
                })->values();
            });

            foreach ($countryNames as $code => $translations) {
                if (isset($dataByCountry[$code])) {
                    $countries[] = (object)['code' => $code, 'name' => $translations[$locale] ?? $translations['en']];
                }
            }
        }

        return view('home', compact(
            'searchQuery', 'searchResults', 'popularTemplates', 'countries',
            'dataByCountry', 'countryNames', 'locale'
        ));
    }

    // --- Метод show остается без изменений ---
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

    public function generateDocument(Request $request, string $locale, Template $template, WordExportService $wordExportService)
    {
        $validatedData = $this->validateFormData($request, $template);
        $processedData = $this->processTemplateData($template, $validatedData);

        GeneratedDocument::create([
            'user_id' => Auth::id(),
            'template_id' => $template->id,
            'user_template_id' => null,
            'data' => $validatedData,
        ]);

        $header = $this->replacePlaceholders($template->header_html, $processedData);
        $body = $this->replacePlaceholders($template->body_html, $processedData);
        $footer = $this->replacePlaceholders($template->footer_html, $processedData);

        if ($request->has('generate_docx')) {
            $fullHtml = $header . $body . $footer;
            $fileName = Str::slug($template->title) . '.docx';
            return $wordExportService->generateFromHtml($fullHtml, $fileName);
        }

        $fullHtmlForPdf = view('pdf.layout', compact('header', 'body', 'footer', 'template'))->render();
        $pdf = Pdf::loadHTML($fullHtmlForPdf)->setOptions(['isHtml5ParserEnabled' => true, 'defaultFont' => 'DejaVu Sans']);
        $fileName = Str::slug($template->title) . '-' . time() . '.pdf';
        return $pdf->download($fileName);
    }

    private function replacePlaceholders(?string $html, array $data): string
    {
        if (empty($html)) {
            return '';
        }

        $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);

        // Заменяем данные из формы
        foreach ($data as $key => $value) {
            // Сначала обрабатываем условные блоки [[key]]...[[/key]]
            $pattern = "/\[\[" . preg_quote($key, '/') . "\]\](.*?)\[\[\/" . preg_quote($key, '/') . "\]\]/s";
            if (!empty($value)) {
                // Если данные есть, убираем теги, оставляем содержимое
                $html = preg_replace($pattern, '$1', $html);
            } else {
                // Если данных нет, удаляем весь блок
                $html = preg_replace($pattern, '', $html);
            }
            // Затем заменяем простые плейсхолдеры [[key]]
            $html = str_replace("[[{$key}]]", $value, $html);
        }

        // --- КЛЮЧЕВОЕ ИСПРАВЛЕНИЕ ---
        // Удаляем ВСЕ оставшиеся плейсхолдеры любого вида, для которых не было данных.
        // Это включает в себя [[/some_key]] или [[unfilled_key]]
        $html = preg_replace('/\[\[.*?\]\]/s', '', $html);

        return $html;
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

    private function processTemplateData(Template $template, array $validatedData): array
    {
        $templateFields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];
        $textareaFields = [];
        foreach ($templateFields as $field) {
            if (($field['type'] ?? 'text') === 'textarea') {
                $textareaFields[] = $field['name'];
            }
        }

        $processedData = [];
        foreach ($validatedData as $key => $value) {
            if (is_null($value)) {
                $processedData[$key] = '';
                continue;
            }
            if (in_array($key, $textareaFields)) {
                $processedData[$key] = nl2br(e($value));
            } else {
                $processedData[$key] = e($value);
            }
        }
        return $processedData;
    }
}
