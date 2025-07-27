<?php

// Файл: app/Http/Controllers/UserTemplateController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UserTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\WordExportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\GeneratedDocument;

class UserTemplateController extends Controller
{
    public function index()
    {
        $userTemplates = Auth::user()->userTemplates()->with('category')->latest()->paginate(10);
        return view('my-templates.index', compact('userTemplates'));
    }

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

    public function store(Request $request)
    {
        $user = $request->user();

        // ✅ ИЗМЕНЕННАЯ ЛОГИКА: Ссылка в ошибке ведет на страницу тарифов
        if (!$user->canPerformAction('custom_template')) {
            $errorMessage = __('messages.limit_exhausted_custom_template_error', ['url' => route('pricing', app()->getLocale())]);
            return back()->withInput()->with('error_html', $errorMessage);
        }

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'country_code'  => 'required|string',
            'category_id'   => 'required|integer|exists:categories,id',
            'fields'        => 'required|json',
            'layout'        => 'required|string',
        ]);

        $validated['fields'] = json_decode($validated['fields'], true);
        Auth::user()->userTemplates()->create($validated);

        $user->decrementLimit('custom_template');

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

    public function generateDocument(Request $request, string $locale, UserTemplate $userTemplate, WordExportService $wordExportService)
    {
        if ($userTemplate->user_id !== Auth::id()) {
            abort(403);
        }

        $user = $request->user();

        // ✅ ИЗМЕНЕННАЯ ЛОГИКА: Ссылка в ошибке ведет на страницу тарифов
        if (!$user->canPerformAction('download')) {
            $errorMessage = __('messages.limit_exhausted_error', ['url' => route('pricing', app()->getLocale())]);
            return back()->withInput()->with('error_html', $errorMessage);
        }

        $validatedData = $this->validateFormData($request, $userTemplate);
        $html = $this->processPlaceholders($userTemplate, $validatedData);

        GeneratedDocument::create([
            'user_id' => Auth::id(),
            'user_template_id' => $userTemplate->id,
            'template_id' => null,
            'data' => $validatedData,
        ]);

        $user->decrementLimit('download');

        if ($request->has('generate_pdf')) {
            $pdf = Pdf::loadHTML($html)->setOptions(['isHtml5ParserEnabled' => true, 'defaultFont' => 'DejaVu Sans']);
            $fileName = Str::slug($userTemplate->name) . '-' . time() . '.pdf';
            return $pdf->download($fileName);

        } elseif ($request->has('generate_docx')) {
            $fileName = Str::slug($userTemplate->name) . '.docx';
            return $wordExportService->generateFromHtml($html, $fileName);
        }

        return back();
    }

    private function processPlaceholders(UserTemplate $template, array $data): string
    {
        $html = htmlspecialchars_decode($template->layout);

        foreach ($data as $key => $value) {
            $placeholderToFind = "__".$key."__";
            $html = str_replace($placeholderToFind, e($value), $html);
        }

        $html = str_replace('[[current_date]]', now()->format('d.m.Y'), $html);
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

        $validated['fields'] = json_decode($validated['fields'], true);
        $userTemplate->update($validated);

        return redirect()->route('profile.my-templates.index', $locale)
            ->with('success', 'Шаблон успешно обновлен!');
    }

    public function destroy(string $locale, UserTemplate $userTemplate)
    {
        if ($userTemplate->user_id !== Auth::id()) {
            abort(403);
        }

        $userTemplate->delete();

        return redirect()->route('profile.my-templates.index', $locale)
            ->with('success', 'Шаблон успешно удален!');
    }

    private function validateFormData(Request $request, UserTemplate $template): array
    {
        $rules = [];
        $fields = is_array($template->fields) ? $template->fields : json_decode($template->fields, true) ?? [];
        foreach ($fields as $field) {
            $rules[$field['key']] = 'required|string|max:255';
        }
        return $request->validate($rules);
    }
}
