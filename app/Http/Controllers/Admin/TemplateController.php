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
        return view('admin.templates.create', compact('categories', 'locales'));
    }

    public function store(Request $request)
    {
        $locales = config('app.available_locales');
        $validationRules = [
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|unique:templates,slug|alpha_dash',
            'blade_view' => 'required|string',
            'fields' => 'required|json',
            'is_active' => 'required|boolean',
        ];

        foreach ($locales as $locale) {
            $validationRules["translations.{$locale}.title"] = 'required|string|max:255';
            $validationRules["translations.{$locale}.description"] = 'required|string';
        }

        $request->validate($validationRules);

        DB::transaction(function () use ($request, $locales) {
            $template = Template::create($request->only('category_id', 'slug', 'blade_view', 'fields', 'is_active'));

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

    public function edit(Template $template)
    {
        $categories = Category::all();
        $locales = config('app.available_locales');
        $template->load('translations');

        $translations = $template->translations->keyBy('locale');

        return view('admin.templates.edit', compact('template', 'categories', 'locales', 'translations'));
    }

    public function update(Request $request, Template $template)
    {
        $locales = config('app.available_locales');
        $validationRules = [
            'category_id' => 'required|exists:categories,id',
            'slug' => 'required|alpha_dash|unique:templates,slug,' . $template->id,
            'blade_view' => 'required|string',
            'fields' => 'required|json',
            'is_active' => 'required|boolean',
        ];

        foreach ($locales as $locale) {
            $validationRules["translations.{$locale}.title"] = 'required|string|max:255';
            $validationRules["translations.{$locale}.description"] = 'required|string';
        }

        $request->validate($validationRules);

        DB::transaction(function () use ($request, $template, $locales) {
            $template->update($request->only('category_id', 'slug', 'blade_view', 'fields', 'is_active'));

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

        return redirect()->route('admin.templates.index')->with('success', 'Template updated successfully.');
    }

    public function destroy(Template $template)
    {
        $template->delete(); // translations will be deleted by cascade
        return redirect()->route('admin.templates.index')->with('success', 'Template deleted successfully.');
    }
}
