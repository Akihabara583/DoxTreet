<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request)
    {
        $locales = config('app.available_locales');

        // Правила валидации для общих и переводимых полей
        $validationRules = [
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|unique:templates,slug|alpha_dash',
            'is_active' => 'required|boolean',
            'country_code' => 'nullable|string|max:5',
            'fields' => 'required|json', // Поле fields теперь общее
        ];

        foreach ($locales as $locale) {
            $validationRules["translations.{$locale}.title"] = 'required|string|max:255';
            $validationRules["translations.{$locale}.description"] = 'nullable|string';
            $validationRules["translations.{$locale}.header_html"] = 'nullable|string';
            $validationRules["translations.{$locale}.body_html"] = 'nullable|string';
            $validationRules["translations.{$locale}.footer_html"] = 'nullable|string';
        }

        $request->validate($validationRules);

        DB::transaction(function () use ($request, $locales) {
            $templateData = $request->only('category_id', 'slug', 'is_active', 'country_code');

            // ДОБАВЬТЕ ЭТУ СТРОКУ:
            // Мы вручную декодируем JSON перед передачей в модель
            $templateData['fields'] = json_decode($request->input('fields'), true);

            $template = Template::create($templateData);

            foreach ($locales as $locale) {
                $template->translations()->create($request->input("translations.{$locale}"));
            }
        });

        return redirect()->route('admin.templates.index')->with('success', 'Шаблон успешно создан.');
    }

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

        // Правила валидации для общих и переводимых полей
        $validationRules = [
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|alpha_dash|unique:templates,slug,' . $template->id,
            'is_active' => 'required|boolean',
            'country_code' => 'nullable|string|max:5',
            'fields' => 'required|json', // Поле fields теперь общее
        ];

        foreach ($locales as $locale) {
            $validationRules["translations.{$locale}.title"] = 'required|string|max:255';
            $validationRules["translations.{$locale}.description"] = 'nullable|string';
            $validationRules["translations.{$locale}.header_html"] = 'nullable|string';
            $validationRules["translations.{$locale}.body_html"] = 'nullable|string';
            $validationRules["translations.{$locale}.footer_html"] = 'nullable|string';
        }

        $request->validate($validationRules);

        // В методе update
        DB::transaction(function () use ($request, $template, $locales) {
            $updateData = $request->only('category_id', 'slug', 'is_active', 'country_code');

            // ДОБАВЬТЕ ЭТУ СТРОКУ:
            // Мы также вручную декодируем JSON перед обновлением
            $updateData['fields'] = json_decode($request->input('fields'), true);

            $template->update($updateData);

            foreach ($locales as $locale) {
                $template->translations()->updateOrCreate(
                    ['locale' => $locale],
                    $request->input("translations.{$locale}")
                );
            }
        });

        return redirect()->route('admin.templates.index', ['locale' => app()->getLocale()])->with('success', 'Шаблон успешно обновлен.');
    }

    public function destroy(string $locale, string $templateId)
    {
        $template = Template::findOrFail($templateId);
        $template->delete();
        return redirect()->route('admin.templates.index', ['locale' => app()->getLocale()])->with('success', 'Шаблон удален.');
    }
}
