<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentBundle;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentBundleController extends Controller
{
    protected $supportedLocales = ['en', 'pl', 'uk', 'de'];

    public function index()
    {
        $bundles = DocumentBundle::withCount('templates')->latest()->paginate(15);
        return view('admin.bundles.index', compact('bundles'));
    }

    public function create()
    {
        $templatesByCountry = Template::with('translation')->where('is_active', true)->get()->groupBy('country_code');
        $bundle = new DocumentBundle();
        $locales = $this->supportedLocales;
        return view('admin.bundles.create', compact('templatesByCountry', 'bundle', 'locales'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateBundle($request);

        $slug = Str::slug($validated['title']['en']) . '-' . strtolower($validated['country_code']);
        $count = DocumentBundle::where('slug', 'LIKE', $slug . '%')->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $bundle = DocumentBundle::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'country_code' => $validated['country_code'],
            'slug' => $slug,
        ]);

        $this->syncTemplates($bundle, $validated);

        return redirect()->route('admin.bundles.index', ['locale' => app()->getLocale()])->with('success', 'Пакет успешно создан.');
    }

    // ✅ ИЗМЕНЕНИЕ: Логика как в PostController
    public function edit(string $locale, int $id)
    {
        $bundle = DocumentBundle::findOrFail($id);
        $templatesByCountry = Template::with('translation')->where('is_active', true)->get()->groupBy('country_code');
        $locales = $this->supportedLocales;
        $selectedTemplates = $bundle->templates()->orderBy('step_order')->get();
        return view('admin.bundles.edit', compact('bundle', 'templatesByCountry', 'locales', 'selectedTemplates'));
    }

    // ✅ ИЗМЕНЕНИЕ: Логика как в PostController
    public function update(Request $request, string $locale, int $id)
    {
        $bundle = DocumentBundle::findOrFail($id);
        $validated = $this->validateBundle($request, $bundle);

        $bundle->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'country_code' => $validated['country_code'],
        ]);

        $this->syncTemplates($bundle, $validated);

        return redirect()->route('admin.bundles.index', ['locale' => app()->getLocale()])->with('success', 'Пакет успешно обновлен.');
    }

    // ✅ ИЗМЕНЕНИЕ: Логика как в PostController
    public function destroy(string $locale, int $id)
    {
        $bundle = DocumentBundle::findOrFail($id);
        $bundle->templates()->detach();
        $bundle->delete();
        return redirect()->route('admin.bundles.index', ['locale' => app()->getLocale()])->with('success', 'Пакет успешно удален.');
    }

    protected function validateBundle(Request $request)
    {
        $rules = [
            'title' => 'required|array',
            'description' => 'nullable|array',
            'country_code' => 'required|string|size:2',
            'templates' => 'required|array|min:1',
            'templates.*' => 'exists:templates,id',
            'is_optional' => 'nullable|array',
            'is_optional.*' => 'in:1',
        ];
        foreach ($this->supportedLocales as $locale) {
            $rules['title.' . $locale] = ($locale == 'en' ? 'required' : 'nullable') . '|string|max:255';
            $rules['description.' . $locale] = 'nullable|string';
        }
        return $request->validate($rules);
    }

    protected function syncTemplates(DocumentBundle $bundle, array $validatedData)
    {
        $syncData = [];
        foreach ($validatedData['templates'] as $index => $templateId) {
            $syncData[$templateId] = [
                'step_order' => $index + 1,
                'is_optional' => isset($validatedData['is_optional'][$templateId]) && $validatedData['is_optional'][$templateId] == '1'
            ];
        }
        $bundle->templates()->sync($syncData);
    }
}
