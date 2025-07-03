<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::with('category', 'translation')->latest()->paginate(10);
        return view('admin.templates.index', compact('templates'));
    }

    public function create()
    {
        $categories = Category::all();
        $locales = config('app.available_locales');
        $countries = config('app.available_countries');
        return view('admin.templates.create', compact('categories', 'locales', 'countries'));
    }

    // В файле app/Http/Controllers/Admin/TemplateController.php

    public function store(Request $request)
    {
        $locales = config('app.available_locales');
        $validationRules = [
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|unique:templates,slug|alpha_dash',
            // 'blade_view' больше не нужен, его можно удалить из валидации
            'fields' => 'required|json',
            'is_active' => 'required|boolean',
            'header_html' => 'nullable|string', // Добавляем новые поля
            'country_code' => 'nullable|string|max:5',
            'body_html' => 'nullable|string',
            'footer_html' => 'nullable|string',
        ];

        foreach ($locales as $locale) {
            $validationRules["translations.{$locale}.title"] = 'required|string|max:255';
            $validationRules["translations.{$locale}.description"] = 'required|string';
        }

        $request->validate($validationRules);

        // Используем DB::transaction, как у вас и было - это хорошо
        DB::transaction(function () use ($request, $locales) {
            // Забираем все нужные поля из запроса
            $templateData = $request->only(
                'category_id', 'slug', 'fields', 'is_active', 'header_html', 'body_html', 'footer_html','country_code',
            );

            $template = Template::create($templateData);

            foreach ($locales as $locale) {
                $template->translations()->create([
                    'locale' => $locale,
                    'title' => $request->input("translations.{$locale}.title"),
                    'description' => $request->input("translations.{$locale}.description"),
                ]);
            }
        });

        return redirect()->route('admin.templates.index')->with('success', 'Template created successfully.');
    }

    // В файле app/Http/Controllers/Admin/TemplateController.php

    public function edit(string $locale, string $templateId)
    {
        $template = Template::with('translations')->findOrFail($templateId);
        $categories = Category::all();
        $locales = config('app.available_locales');
        $countries = config('app.available_countries');
        $translations = $template->translations->keyBy('locale');

        return view('admin.templates.edit', compact('template', 'categories', 'locales', 'translations', 'countries'));
    }

    public function update(Request $request, string $locale, string $templateId)
    {
        $template = Template::findOrFail($templateId);

        $locales = config('app.available_locales');
        $validationRules = [
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|alpha_dash|unique:templates,slug,' . $template->id,
            'fields' => 'required|json',
            'is_active' => 'required|boolean',
            'header_html' => 'nullable|string', // Добавляем новые поля
            'country_code' => 'nullable|string|max:5',
            'body_html' => 'nullable|string',
            'footer_html' => 'nullable|string',
        ];

        foreach ($locales as $locale) {
            $validationRules["translations.{$locale}.title"] = 'required|string|max:255';
            $validationRules["translations.{$locale}.description"] = 'required|string';
        }

        $request->validate($validationRules);

        DB::transaction(function () use ($request, $template, $locales) {
            // Обновляем основные поля и новые HTML-поля
            $template->update($request->only(
                'category_id', 'slug', 'fields', 'is_active', 'header_html', 'body_html', 'footer_html','country_code',
            ));

            foreach ($locales as $locale) {
                $template->translations()->updateOrCreate(
                    ['locale' => $locale],
                    [
                        'title' => $request->input("translations.{$locale}.title"),
                        'description' => $request->input("translations.{$locale}.description"),
                    ]
                );
            }
        });

        // Перенаправляем с правильным locale
        return redirect()->route('admin.templates.index', ['locale' => app()->getLocale()])->with('success', 'Template updated successfully.');
    }

    public function destroy(string $locale, string $templateId)
    {
        $template = Template::findOrFail($templateId);
        $template->delete();
        return redirect()->route('admin.templates.index', ['locale' => app()->getLocale()])->with('success', 'Template deleted successfully.');
    }
}
