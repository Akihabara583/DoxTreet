<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\WordExportService;
use App\Models\GeneratedDocument;

class DocumentController extends Controller
{
    public function show(Request $request, string $locale, string $countryCode, string $templateSlug): View
    {
        $template = Template::query()
            ->where('country_code', $countryCode)
            ->where('slug', $templateSlug)
            ->where('is_active', true)
            ->firstOrFail();

        if ($request->has('data') && is_array($request->input('data'))) {
            $prefillData = $request->input('data');
        } else {
            $prefillData = [];
            if (Auth::check()) {
                $user = Auth::user();
                $details = $user->details;

                if ($details) {
                    $fields = $template->fields ?? [];
                    foreach ($fields as $field) {
                        $fieldName = $field['name'];
                        $fieldValue = $this->getPrefillValueForField($fieldName, $details, $user);
                        if ($fieldValue) {
                            $prefillData[$fieldName] = $fieldValue;
                        }
                    }
                }
            }
        }

        return view('documents.render-form', [
            'templateModel' => $template,
            'currentLocale' => $locale,
            'prefillData'   => $prefillData,
        ]);
    }

    private function getPrefillValueForField(string $fieldName, UserDetail $details, User $user): ?string
    {
        $fieldNameLower = strtolower($fieldName);

        switch (true) {
            case $this->fieldContains($fieldNameLower, ['pib', 'піб', 'fio', 'full_name', 'employee_name']):
                return $details->full_name_nominative;
            case $this->fieldContains($fieldNameLower, ['posada', 'position', 'должность', 'employee_position']):
                return $details->position;
            case $this->fieldContains($fieldNameLower, ['phone', 'телефон', 'telefon']):
                return $details->phone_number;
            case $this->fieldContains($fieldNameLower, ['email']):
                return $details->contact_email ?? $user->email;
            case $this->fieldContains($fieldNameLower, ['address_registered', 'employee_address', 'адреса_реєстрації', 'прописка']):
                return $details->address_registered;
            case $this->fieldContains($fieldNameLower, ['tax_id', 'ipn', 'рнокпп', 'іпн', 'employee_rnekpp']):
                return $details->tax_id_number;
            case $this->fieldContains($fieldNameLower, ['passport', 'паспорт', 'employee_passport']):
                if ($details->passport_series && $details->passport_number) {
                    $passportDate = optional($details->passport_date)->format('d.m.Y');
                    return "серія {$details->passport_series} № {$details->passport_number}, виданий {$details->passport_issuer} {$passportDate} р.";
                }
                return null;
            case $this->fieldContains($fieldNameLower, ['company_name', 'роботодавець', 'виконавець']):
                return $details->legal_entity_name;
            case $this->fieldContains($fieldNameLower, ['company_tax_id', 'edrpou', 'єдрпоу', 'company_edrpou']):
                return $details->legal_entity_tax_id;
            case $this->fieldContains($fieldNameLower, ['company_address', 'юридична_адреса']):
                return $details->legal_entity_address;
            case $this->fieldContains($fieldNameLower, ['represented_by', 'представник', 'director_name']):
                return $details->represented_by;
            case $this->fieldContains($fieldNameLower, ['linkedin']):
            case $this->fieldContains($fieldNameLower, ['website', 'сайт']):
                return $details->website;
            default:
                return null;
        }
    }

    private function fieldContains(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (str_contains($haystack, $needle)) {
                return true;
            }
        }
        return false;
    }

    public function generate(Request $request, string $locale, string $countryCode, string $templateSlug)
    {
        $template = Template::query()
            ->where('country_code', $countryCode)
            ->where('slug', $templateSlug)
            ->firstOrFail();

        $validatedData = $this->validateFormData($request, $template);

        if (Auth::check()) {
            $user = Auth::user();
            $documentCount = GeneratedDocument::where('user_id', $user->id)->count();
            if ($documentCount >= 20) {
                GeneratedDocument::where('user_id', $user->id)->oldest()->first()?->delete();
            }
            GeneratedDocument::create([
                'user_id' => $user->id,
                'template_id' => $template->id,
                'data' => $validatedData,
            ]);
        }

        // ✅ ИЗМЕНЕНИЕ: Объединяем HTML до всех замен
        $fullHtml = ($template->header_html ?? '') . ($template->body_html ?? '') . ($template->footer_html ?? '');

        // ✅ ШАГ 1: Обрабатываем условные блоки
        $fullHtml = $this->replaceConditionalPlaceholders($fullHtml, $validatedData);

        // ✅ ШАГ 2: Обрабатываем обычные плейсхолдеры
        $fullHtml = $this->replaceSimplePlaceholders($fullHtml, $validatedData);

        $fileName = Str::slug($template->title) . '-' . time();

        if ($request->has('generate_pdf')) {
            $pdf = Pdf::loadHTML($fullHtml);
            return $pdf->download($fileName . '.pdf');
        }

        if ($request->has('generate_docx')) {
            $wordService = new WordExportService();
            return $wordService->generateFromHtml($fullHtml, $fileName . '.docx');
        }

        return redirect()->back()->with('error', 'Не удалось определить тип файла для генерации.');
    }

    /**
     * ✅ НОВЫЙ МЕТОД
     * Заменяет простые плейсхолдеры вида [[key]] на значения.
     */
    private function replaceSimplePlaceholders(string $html, array $data): string
    {
        foreach ($data as $key => $value) {
            $html = str_replace("[[{$key}]]", e($value), $html);
        }
        if (auth()->check()) {
            $details = auth()->user()->details;
            if ($details) {
                $html = str_replace('[[user_full_name_nominative]]', e($details->full_name_nominative), $html);
                $html = str_replace('[[company_name]]', e($details->legal_entity_name), $html);
            }
        }
        $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);
        return $html;
    }

    /**
     * ✅ НОВЫЙ МЕТОД
     * Обрабатывает условные блоки [[key]]...[[/key]].
     */
    private function replaceConditionalPlaceholders(string $html, array $data): string
    {
        // Регулярное выражение для поиска блоков [[key]]...[[/key]]
        $pattern = '/\[\[([a-zA-Z0-9_]+)\]\](.*?)\[\[\/\1\]\]/s';

        return preg_replace_callback($pattern, function ($matches) use ($data) {
            $key = $matches[1];
            $content = $matches[2];

            // Если ключ существует в данных и его значение не пустое, возвращаем содержимое блока.
            if (isset($data[$key]) && !empty($data[$key])) {
                return $content;
            }

            // Иначе, удаляем весь блок (возвращаем пустую строку).
            return '';
        }, $html);
    }

    private function validateFormData(Request $request, Template $template): array
    {
        $rules = [];
        $attributeNames = [];
        $locale = app()->getLocale();
        $fields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];

        foreach ($fields as $field) {
            $fieldName = $field['name'];
            if (!empty($field['required'])) {
                $rules[$fieldName] = 'required';
            } else {
                $rules[$fieldName] = 'nullable';
            }
            if (($field['type'] ?? 'text') === 'email') $rules[$fieldName] .= '|email';
            if (($field['type'] ?? 'text') === 'number') $rules[$fieldName] .= '|numeric';
            $attributeNames[$fieldName] = $field['labels'][$locale] ?? $fieldName;
        }

        return $request->validate($rules, [], $attributeNames);
    }
}
