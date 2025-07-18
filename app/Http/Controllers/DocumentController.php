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

class DocumentController extends Controller
{
    /**
     * ✅ **ФІНАЛЬНА УНІВЕРСАЛЬНА ВЕРСІЯ**
     * Показує форму і "розумно" передзаповнює її даними, аналізуючи назви полів.
     * Працює для різних шаблонів (договори, резюме тощо).
     */
    public function show(string $locale, string $countryCode, string $templateSlug): View
    {
        $template = Template::query()
            ->where('country_code', $countryCode)
            ->where('slug', $templateSlug)
            ->where('is_active', true)
            ->firstOrFail();

        $prefillData = [];

        if (Auth::check()) {
            $user = Auth::user();
            $details = $user->details;

            if ($details) {
                $fields = $template->fields ?? [];

                foreach ($fields as $field) {
                    $fieldName = $field['name'];
                    // Отримуємо значення за допомогою нової універсальної функції
                    $fieldValue = $this->getPrefillValueForField($fieldName, $details, $user);

                    if ($fieldValue) {
                        $prefillData[$fieldName] = $fieldValue;
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

    /**
     * Універсальна функція для визначення, які дані підставити в поле.
     * @param string $fieldName - системне ім'я поля
     * @param \App\Models\UserDetail $details - модель з даними користувача
     * @param \App\Models\User $user - модель користувача
     * @return string|null
     */
    private function getPrefillValueForField(string $fieldName, UserDetail $details, User $user): ?string
    {
        $fieldNameLower = strtolower($fieldName);

        // --- Логіка "розумного" співставлення за ключовими словами ---
        switch (true) {
            // --- Особисті дані (Працівник, Заявник, Автор резюме) ---
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

            // --- Дані Компанії (Роботодавець, Виконавець) ---
            case $this->fieldContains($fieldNameLower, ['company_name', 'роботодавець', 'виконавець']):
                return $details->legal_entity_name;

            case $this->fieldContains($fieldNameLower, ['company_tax_id', 'edrpou', 'єдрпоу', 'company_edrpou']):
                return $details->legal_entity_tax_id;

            case $this->fieldContains($fieldNameLower, ['company_address', 'юридична_адреса']):
                return $details->legal_entity_address;

            case $this->fieldContains($fieldNameLower, ['represented_by', 'представник', 'director_name']):
                return $details->represented_by;

            // --- Інше ---
            case $this->fieldContains($fieldNameLower, ['linkedin']):
            case $this->fieldContains($fieldNameLower, ['website', 'сайт']):
                return $details->website;

            default:
                return null;
        }
    }

    /**
     * Вспомогательная функция для проверки наличия ключевых слов в строке.
     */
    private function fieldContains(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (str_contains($haystack, $needle)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Генерирует PDF или DOCX на основе данных из формы.
     * (Цей метод залишається без змін)
     */
    public function generate(Request $request, string $locale, string $countryCode, string $templateSlug)
    {
        $template = Template::query()
            ->where('country_code', $countryCode)
            ->where('slug', $templateSlug)
            ->firstOrFail();

        $validatedData = $this->validateFormData($request, $template);

        $replacePlaceholders = function ($html, $data) {
            if (empty($html)) return '';
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
        };

        $fileName = Str::slug($template->title) . '-' . time();

        if ($request->has('generate_pdf')) {
            $header = $replacePlaceholders($template->header_html, $validatedData);
            $body   = $replacePlaceholders($template->body_html, $validatedData);
            $footer = $replacePlaceholders($template->footer_html, $validatedData);

            $pdf = Pdf::loadView('pdf.document-layout', [
                'title'  => $template->title,
                'header' => $header,
                'body'   => $body,
                'footer' => $footer,
            ]);

            return $pdf->download($fileName . '.pdf');
        }

        if ($request->has('generate_docx')) {
            $fullHtml = ($template->header_html ?? '') . ($template->body_html ?? '') . ($template->footer_html ?? '');
            $fullHtml = str_replace('<br>', '<br />', $fullHtml);
            $processedHtml = $replacePlaceholders($fullHtml, $validatedData);

            $wordService = new WordExportService();
            return $wordService->generateFromHtml($processedHtml, $fileName . '.docx');
        }

        return redirect()->back()->with('error', 'Не удалось определить тип файла для генерации.');
    }

    /**
     * Метод для валидации полей формы.
     * (Цей метод залишається без змін)
     */
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
