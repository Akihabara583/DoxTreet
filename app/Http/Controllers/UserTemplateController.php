<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UserTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\WordExportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class UserTemplateController extends Controller
{
    /**
     * Показывает список шаблонов, созданных пользователем.
     */
    public function index()
    {
        $userTemplates = Auth::user()->userTemplates()->with('category')->latest()->paginate(10);
        return view('my-templates.index', compact('userTemplates'));
    }

    /**
     * Показывает форму для создания нового пользовательского шаблона.
     */
    public function create()
    {
        $allCategories = Category::where('is_active', true)->get();

        $categoriesWithTranslations = $allCategories->map(function ($category) {
            return [
                'id' => $category->id,
                'country_code' => $category->country_code,
                'name' => $category->getTranslations('name'),
            ];
        });

        $categoriesByCountry = $categoriesWithTranslations->groupBy('country_code');
        $countries = $categoriesByCountry->keys()->sort();

        return view('my-templates.create', compact('categoriesByCountry', 'countries'));
    }

    /**
     * ✅ ИСПРАВЛЕННЫЙ МЕТОД
     * Сохраняет новый пользовательский шаблон в базу данных.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'country_code'  => 'required|string',
            'category_id'   => 'required|integer|exists:categories,id',
            'fields'        => 'required|json',
            'layout'        => 'required|string',
        ]);

        // Раскодируем JSON в массив перед созданием
        $validated['fields'] = json_decode($validated['fields'], true);

        // Я убрал лишнюю проверку, которая вызывала ошибку
        Auth::user()->userTemplates()->create($validated);

        return redirect()->route('profile.my-templates.index', app()->getLocale())
            ->with('success', 'Шаблон успешно создан!');
    }

    public function show(string $locale, UserTemplate $userTemplate)
    {
        if ($userTemplate->user_id !== Auth::id()) {
            abort(403);
        }
        return view('my-templates.show', ['template' => $userTemplate]);
    }

    /**
     * Генерирует PDF из пользовательского шаблона.
     */
    public function generateDocument(Request $request, string $locale, UserTemplate $userTemplate, WordExportService $wordExportService)
    {
        if ($userTemplate->user_id !== Auth::id()) {
            abort(403);
        }

        // Валидируем данные
        $validatedData = $this->validateFormData($request, $userTemplate);
        // Обрабатываем плейсхолдеры
        $html = $this->processPlaceholders($userTemplate, $validatedData);

        // Определяем, какую кнопку нажал пользователь
        if ($request->has('generate_pdf')) {
            // --- Логика для PDF ---
            $pdf = Pdf::loadHTML($html)->setOptions(['isHtml5ParserEnabled' => true, 'defaultFont' => 'DejaVu Sans']);
            $fileName = Str::slug($userTemplate->name) . '-' . time() . '.pdf';
            return $pdf->download($fileName);

        } elseif ($request->has('generate_docx')) {
            // --- Логика для DOCX ---
            // Убедись, что в макете шаблона нет <br>, а есть <br />
            $fileName = Str::slug($userTemplate->name) . '.docx';
            return $wordExportService->generateFromHtml($html, $fileName);
        }

        // Если что-то пошло не так, просто возвращаемся назад
        return back();
    }


    /**
     * Заменяет плейсхолдеры в макете.
     */
    private function processPlaceholders(UserTemplate $template, array $data): string
    {
        $html = htmlspecialchars_decode($template->layout);

        // ✅ ИЩЕМ НОВЫЙ, ПРОСТОЙ ФОРМАТ __ключ__
        foreach ($data as $key => $value) {
            $placeholderToFind = "__".$key."__";
            $html = str_replace($placeholderToFind, e($value), $html);
        }

        // Заменяем системные плейсхолдеры
        $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);

        // Применяем форматирование
        $html = nl2br($html);
        $html = str_replace('<br>', '<br />', $html);

        return $html;
    }

    public function edit(string $locale, UserTemplate $userTemplate)
    {
        if ($userTemplate->user_id !== Auth::id()) {
            abort(403);
        }

        $allCategories = Category::where('is_active', true)->get();
        $categoriesWithTranslations = $allCategories->map(function ($category) {
            return [
                'id' => $category->id,
                'country_code' => $category->country_code,
                'name' => $category->getTranslations('name'),
            ];
        });
        $categoriesByCountry = $categoriesWithTranslations->groupBy('country_code');
        $countries = $categoriesByCountry->keys()->sort();

        return view('my-templates.edit', compact('userTemplate', 'categoriesByCountry', 'countries'));
    }

    /**
     * ✅ ИСПРАВЛЕННЫЙ МЕТОД
     * Обновляет данные шаблона в базе данных.
     */
    public function update(Request $request, string $locale, UserTemplate $userTemplate)
    {
        if ($userTemplate->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'country_code'  => 'required|string',
            'category_id'   => 'required|integer|exists:categories,id',
            'fields'        => 'required|json',
            'layout'        => 'required|string',
        ]);

        // Раскодируем JSON в массив перед обновлением
        $validated['fields'] = json_decode($validated['fields'], true);

        $userTemplate->update($validated);

        return redirect()->route('profile.my-templates.index', $locale)
            ->with('success', 'Шаблон успешно обновлен!');
    }

    /**
     * Удаляет шаблон.
     */
    public function destroy(string $locale, UserTemplate $userTemplate)
    {
        if ($userTemplate->user_id !== Auth::id()) {
            abort(403);
        }

        $userTemplate->delete();

        return redirect()->route('profile.my-templates.index', $locale)
            ->with('success', 'Шаблон успешно удален!');
    }

    /**
     * Валидирует данные формы на основе полей шаблона.
     */
    private function validateFormData(Request $request, UserTemplate $template): array
    {
        $rules = [];
        // Убедимся, что $template->fields это массив
        $fields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];
        foreach ($fields as $field) {
            $rules[$field['key']] = 'required|string|max:255';
        }
        return $request->validate($rules);
    }
}
