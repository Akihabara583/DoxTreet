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
    // Метод index остается без изменений
    public function index(Request $request)
    {
        $locale = app()->getLocale();
        $searchQuery = $request->query('q');
        $searchResults = null;

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

            $countries = [];
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

    // Метод show остается без изменений
    public function show(Request $request, string $locale, Template $template)
    {
        // ... ваш код для show ...
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

    /**
     * ✅ НОВЫЙ ЕДИНЫЙ МЕТОД ДЛЯ ГЕНЕРАЦИИ
     * Генерирует PDF или DOCX из системного шаблона и сохраняет историю.
     */
    public function generateDocument(Request $request, string $locale, Template $template, WordExportService $wordExportService)
    {
        // 1. Валидируем данные из формы
        $validatedData = $this->validateFormData($request, $template);
        // 2. Обрабатываем данные (например, заменяем переносы строк для textarea)
        $processedData = $this->processTemplateData($template, $validatedData);

        // 3. Собираем полный HTML документа из частей
        $html = $template->header_html . $template->body_html . $template->footer_html;

        // 4. Заменяем плейсхолдеры в HTML на данные пользователя
        foreach ($processedData as $key => $value) {
            $html = str_replace("{{{$key}}}", $value, $html);
        }
        // Заменяем системные плейсхолдеры
        $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);

        // 5. ✅ СОХРАНЯЕМ ЗАПИСЬ В ИСТОРИЮ
        GeneratedDocument::create([
            'user_id' => Auth::id(),
            'template_id' => $template->id, // ID системного шаблона
            'user_template_id' => null,      // Пользовательского шаблона здесь нет
            'data' => $validatedData,        // Сохраняем данные для повторного использования
        ]);

        // 6. Генерируем и отдаем нужный файл
        if ($request->has('generate_pdf')) {
            $pdf = Pdf::loadHTML($html)->setOptions(['isHtml5ParserEnabled' => true, 'defaultFont' => 'DejaVu Sans']);
            $fileName = Str::slug($template->title) . '-' . time() . '.pdf';
            return $pdf->download($fileName);

        } elseif ($request->has('generate_docx')) {
            $fileName = Str::slug($template->title) . '.docx';
            return $wordExportService->generateFromHtml($html, $fileName);
        }

        // Если что-то пошло не так
        return back()->with('error', 'Произошла ошибка при генерации документа.');
    }


    // Вспомогательные методы, которые мы используем выше
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
            if ($field['type'] === 'textarea') {
                $textareaFields[] = $field['name'];
            }
        }

        $processedData = [];
        foreach ($validatedData as $key => $value) {
            if (in_array($key, $textareaFields)) {
                $processedData[$key] = nl2br(e($value));
            } else {
                $processedData[$key] = e($value);
            }
        }
        return $processedData;
    }
}
