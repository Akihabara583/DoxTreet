<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;      // ✅ ИСПОЛЬЗУЕМ ВАШ РАБОЧИЙ PDF-ГЕНЕРАТОР
use App\Services\WordExportService;  // ✅ ОСТАВЛЯЕМ СЕРВИС ДЛЯ DOCX

class DocumentController extends Controller
{
    public function show(string $locale, string $countryCode, string $templateSlug): View
    {
        $template = Template::query()
            ->where('country_code', $countryCode)
            ->where('slug', $templateSlug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('documents.render-form', [
            'templateModel' => $template,
            'currentLocale' => $locale
        ]);
    }

    /**
     * ✅ ФИНАЛЬНАЯ ВЕРСИЯ МЕТОДА С ВАШЕЙ ЛОГИКОЙ
     * Генерирует PDF или DOCX на основе данных из формы.
     */
    public function generate(Request $request, string $locale, string $countryCode, string $templateSlug)
    {
        // 1. Находим шаблон
        $template = Template::query()
            ->where('country_code', $countryCode)
            ->where('slug', $templateSlug)
            ->firstOrFail();

        // 2. Валидируем данные (этот метод нужно будет создать или скопировать)
        $validatedData = $this->validateFormData($request, $template);

        // 3. Функция для замены плейсхолдеров (взята из вашего TemplateController)
        $replacePlaceholders = function ($html, $data) {
            if (empty($html)) return '';
            foreach ($data as $key => $value) {
                $html = str_replace("[[{$key}]]", e($value), $html);
            }
            $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);
            // Добавляем замену для user_name и user_email
            if (auth()->check()) {
                $html = str_replace('[[user_name]]', auth()->user()->name, $html);
                $html = str_replace('[[user_email]]', auth()->user()->email, $html);
            }
            return $html;
        };

        // 4. Генерируем имя файла
        $fileName = Str::slug($template->title) . '-' . time();

        // 5. Проверяем, какая кнопка была нажата
        if ($request->has('generate_pdf')) {
            // --- Используем вашу рабочую логику для PDF ---
            $header = $replacePlaceholders($template->header_html, $validatedData);
            $body   = $replacePlaceholders($template->body_html, $validatedData);
            $footer = $replacePlaceholders($template->footer_html, $validatedData);

            // Убедитесь, что у вас есть view 'pdf.document-layout'
            $pdf = Pdf::loadView('pdf.document-layout', [
                'title'  => $template->title,
                'header' => $header,
                'body'   => $body,
                'footer' => $footer,
            ]);

            return $pdf->download($fileName . '.pdf');
        }

        if ($request->has('generate_docx')) {
            // --- Используем вашу рабочую логику для DOCX ---
            $fullHtml = ($template->header_html ?? '') . ($template->body_html ?? '') . ($template->footer_html ?? '');

            // 1. СНАЧАЛА исправляем все теги <br> на <br />
            $fullHtml = str_replace('<br>', '<br />', $fullHtml);

            // 2. ПОТОМ подставляем данные в уже исправленный HTML
            $processedHtml = $replacePlaceholders($fullHtml, $validatedData);

            // Мы не можем передавать сервис в метод generate, т.к. роут не настроен
            // Поэтому создаем его здесь, как вы и делали раньше
            $wordService = new WordExportService();
            return $wordService->generateFromHtml($processedHtml, $fileName . '.docx');
        }

        return redirect()->back()->with('error', 'Не удалось определить тип файла для генерации.');
    }

    /**
     * ✅ ВАЖНО: Скопируйте этот метод из вашего TemplateController.php
     * Метод для валидации полей формы.
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
