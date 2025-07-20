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
        $locale = app()->getLocale();
        $searchQuery = $request->query('q');
        $searchResults = null;

        // Готовим массив с переводами названий стран, он понадобится в любом случае
        $countryNames = [
            'UA' => ['uk' => 'Україна', 'en' => 'Ukraine', 'pl' => 'Ukraina', 'de' => 'Ukraine'],
            'PL' => ['uk' => 'Польща', 'en' => 'Poland', 'pl' => 'Polska', 'de' => 'Polen'],
            'DE' => ['uk' => 'Німеччина', 'en' => 'Germany', 'pl' => 'Niemcy', 'de' => 'Deutschland'],
        ];

        // --- ЛОГИКА ПОИСКА ---
        if ($searchQuery) {
            // Если есть поисковый запрос, ищем шаблоны
            $searchResults = Template::where('is_active', true)
                ->whereHas('translations', function ($query) use ($searchQuery) {
                    $query->where('title', 'LIKE', "%$searchQuery%")
                        ->orWhere('description', 'LIKE', "%$searchQuery%");
                })
                ->with('translation') // Подгружаем перевод для текущего языка
                ->get();
        }

        // --- ЛОГИКА ДЛЯ ОБЫЧНОЙ ЗАГРУЗКИ СТРАНИЦЫ (БЕЗ ПОИСКА) ---
        $countries = null;
        $popularTemplates = null;
        $dataByCountry = null;

        if (!$searchQuery) {
            // Вся ваша рабочая логика для интерактивного каталога
            $popularTemplateIds = GeneratedDocument::query()->select('template_id', DB::raw('count(*) as count'))->groupBy('template_id')->orderByDesc('count')->limit(4)->pluck('template_id');
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

            $dataByCountry = [];
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

        // Передаем все возможные переменные в вид
        return view('home', compact(
            'searchQuery',
            'searchResults',
            'popularTemplates',
            'countries',
            'dataByCountry',
            'countryNames', // Передаем для отображения страны в результатах поиска
            'locale'
        ));
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


    public function generateUserTemplatePdf(Request $request, string $locale, \App\Models\UserTemplate $userTemplate)
    {
        if ($userTemplate->user_id !== Auth::id()) { abort(403); }

        $fields = is_array($userTemplate->fields) ? $userTemplate->fields : json_decode($userTemplate->fields, true) ?? [];
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field['key']] = 'required|string|max:255';
        }
        $validatedData = $request->validate($rules);

        $html = $userTemplate->layout;
        foreach ($validatedData as $key => $value) {
            $html = str_replace("@{{$key}}", e($value), $html);
        }
        $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);

        $pdf = Pdf::loadHTML($html)->setOptions(['isHtml5ParserEnabled' => true, 'defaultFont' => 'DejaVu Sans']);
        $fileName = Str::slug($userTemplate->name) . '-' . time() . '.pdf';
        return $pdf->download($fileName);
    }

    /**
     * ✅ НОВЫЙ МЕТОД: Генерирует DOCX из ПОЛЬЗОВАТЕЛЬСКОГО шаблона.
     */
    public function generateUserTemplateDocx(Request $request, string $locale, \App\Models\UserTemplate $userTemplate, WordExportService $wordExportService)
    {
        if ($userTemplate->user_id !== Auth::id()) { abort(403); }

        $fields = is_array($userTemplate->fields) ? $userTemplate->fields : json_decode($userTemplate->fields, true) ?? [];
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field['key']] = 'required|string|max:255';
        }
        $validatedData = $request->validate($rules);

        $html = $userTemplate->layout;
        foreach ($validatedData as $key => $value) {
            $html = str_replace("@{{$key}}", e($value), $html);
        }
        $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);

        $fileName = Str::slug($userTemplate->name) . '.docx';
        return $wordExportService->generateFromHtml($html, $fileName);
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
