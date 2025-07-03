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
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('q');

        // --- ЛОГИКА ПОПУЛЯРНЫХ ШАБЛОНОВ ---
        $popularTemplateIds = GeneratedDocument::query()
            ->select('template_id', DB::raw('count(*) as count'))
            ->groupBy('template_id')
            ->orderByDesc('count')
            ->limit(4)
            ->pluck('template_id');

        $popularTemplates = Template::whereIn('id', $popularTemplateIds)
            ->with('translation')
            ->get();

        // --- НОВАЯ ЛОГИКА ПОИСКА ---
        // 1. Всегда загружаем ВСЕ категории и шаблоны
        $categories = Category::with(['templates' => function ($query) {
            $query->where('is_active', true)->with('translation');
        }])->get();

        // 2. Если есть поисковый запрос, находим ID совпадающих шаблонов
        $matchingTemplateIds = [];
        if ($searchQuery) {
            $matchingTemplateIds = Template::query()
                ->whereHas('translations', function ($translationQuery) use ($searchQuery) {
                    $translationQuery->where('title', 'like', "%{$searchQuery}%")
                        ->orWhere('description', 'like', "%{$searchQuery}%");
                })
                ->pluck('id') // Нам нужны только ID
                ->toArray();
        }

        // 3. Передаем все данные в представление
        return view('home', compact('categories', 'popularTemplates', 'searchQuery', 'matchingTemplateIds'));
    }

    public function show(Request $request, string $locale, Template $template)
    {
        if (!$template->is_active) {
            abort(404);
        }

        $prefillData = [];

        // 1. Данные из кнопки "Использовать снова" имеют наивысший приоритет
        if ($request->has('data')) {
            $prefillData = $request->input('data', []);
        }
        // 2. Если их нет, пытаемся заполнить из "Цифрового ящика"
        elseif (Auth::check() && Auth::user()->details) {
            $userDetails = Auth::user()->details;
            $templateFields = $template->fields;

            foreach ($templateFields as $field) {
                $fieldName = $field['name'];
                $fieldLabel = strtolower($field['labels'][app()->getLocale()] ?? '');
                // --- УМНОЕ СОПОСТАВЛЕНИЕ ---
                // Сопоставляем разные возможные названия полей с данными из профиля
                switch (true) {
                    // Обработка полей с именем
                    case str_contains($fieldName, 'name'):
                        // ИСПРАВЛЕНО: Сначала проверяем, не нужны ли инициалы
                        if (str_contains($fieldName, 'short') || str_contains($fieldLabel, 'ініціали') || str_contains($fieldLabel, 'inicjały')) {
                            // Вызываем новый метод getShortNameAttribute()
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

                    // Прямое совпадение для остальных полей
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

    public function generatePdf(Request $request, string $locale, Template $template)
    {
        // Блок валидации и сохранения в историю остается без изменений
        if (!$template->is_active) { abort(404); }
        if (!Auth::check()) {
            $executed = RateLimiter::attempt('generate-pdf:'.$request->ip(), 1, function() {});
            if (!$executed) { return back()->with('error', __('messages.rate_limit_exceeded')); }
        }
        $validatedData = $this->validateFormData($request, $template);
        if (Auth::check()) {
            GeneratedDocument::create([
                'user_id' => Auth::id(), 'template_id' => $template->id, 'data' => $validatedData,
            ]);
        }

        // --- ГИБРИДНАЯ ЛОГИКА ГЕНЕРАЦИИ ---
        $pdf = null;

        // ПРОВЕРКА: Если в базе есть HTML для тела документа, используем НОВУЮ систему
        if (!empty($template->body_html)) {

            $replacePlaceholders = function ($html, $data) {
                if (empty($html)) return '';

                // Сначала заменяем плейсхолдеры из данных формы
                foreach ($data as $key => $value) {
                    $html = str_replace("[[{$key}]]", e($value), $html);
                }

                // Теперь заменяем наши системные плейсхолдеры (например, текущую дату)
                $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);

                return $html;
            };

            $header = $replacePlaceholders($template->header_html, $validatedData);
            $body = $replacePlaceholders($template->body_html, $validatedData);
            $footer = $replacePlaceholders($template->footer_html, $validatedData);

            $pdf = Pdf::loadView('pdf.document-layout', [
                'title' => $template->translation->title,
                'header' => $header, 'body' => $body, 'footer' => $footer,
            ]);

        } else { // Иначе, используем СТАРУЮ систему с отдельными Blade-файлами

            // Проверяем, что старый файл шаблона существует
            if ($template->blade_view && view()->exists($template->blade_view)) {
                $pdf = Pdf::loadView($template->blade_view, ['data' => $validatedData]);
            } else {
                // Если не найдено ни HTML в базе, ни файла, возвращаем ошибку
                return response('PDF template content or view file not found.', 500);
            }
        }
        // --- КОНЕЦ ГИБРИДНОЙ ЛОГИКИ ---

        $fileName = Str::slug($template->translation->title) . '-' . time() . '.pdf';
        return $pdf->download($fileName);
    }

    public function generateDocx(Request $request, string $locale, Template $template, WordExportService $wordExportService)
    {
        $formData = $request->except(['_token']);

        // 1. Собираем полный HTML из полей в базе данных
        $fullHtml = ($template->header_html ?? '') . ($template->body_html ?? '') . ($template->footer_html ?? '');

        // 2. Заменяем плейсхолдеры [[field_name]] на данные из формы
        foreach ($formData as $key => $value) {
            // Используем htmlspecialchars для безопасности, чтобы избежать вставки вредоносного HTML
            $fullHtml = str_replace("[[{$key}]]", htmlspecialchars($value), $fullHtml);
        }

        // 3. Заменяем системные переменные, например, текущую дату
        $fullHtml = str_replace('[[current_date]]', now()->format('d.m.Y'), $fullHtml);

        // 4. Генерируем имя файла
        $fileName = Str::slug($template->title) . '.docx';

        // 5. Вызываем НОВЫЙ метод сервиса, передавая ему готовый HTML
        return $wordExportService->generateFromHtml($fullHtml, $fileName);
    }
    private function validateFormData(Request $request, Template $template): array
    {
        $rules = [];
        $attributeNames = [];
        $locale = app()->getLocale();
        $fields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];
        foreach ($fields as $field) {
            if ($field['required']) {
                $rules[$field['name']] = 'required';
            } else {
                $rules[$field['name']] = 'nullable';
            }
            if ($field['type'] === 'email') $rules[$field['name']] .= '|email';
            if ($field['type'] === 'number') $rules[$field['name']] .= '|numeric';
            $attributeNames[$field['name']] = $field['labels'][$locale] ?? $field['name'];
        }
        return $request->validate($rules, [], $attributeNames);
    }

}
