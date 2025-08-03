<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:categories,slug|alpha_dash',
            // Also validate the translation keys
            'name_en' => 'required|string|max:255',
            'name_uk' => 'required|string|max:255',
            'name_pl' => 'required|string|max:255',
        ]);

        Category::create(['slug' => $request->slug]);

        // This is a simplified way to handle translations in lang files
        // A better approach might be a dedicated translations table for categories too
        // But for now, we'll remind the admin to add them manually.
        // In a real app, you'd programmatically write to the lang files.

        return redirect()->route('admin.categories.index')->with('success', 'Category created. Please add translations to lang files.');
    }

    public function edit(string $locale, string $category)
    {
        $category = \App\Models\Category::where('slug', $category)->firstOrFail();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $locale, string $category)
    {
        $categoryModel = \App\Models\Category::where('slug', $category)->firstOrFail();

        $request->validate([
            'slug' => 'required|alpha_dash|unique:categories,slug,' . $categoryModel->id,
            'name_en' => 'required|string|max:255',
            'name_uk' => 'required|string|max:255',
            'name_pl' => 'required|string|max:255',
        ]);

        $categoryModel->update(['slug' => $request->slug]);

        return redirect()->route('admin.categories.index', ['locale' => $locale])->with('success', 'Category updated.');
    }

    public function destroy(string $locale, string $category)
    {
        // Проверяем, является ли текущий пользователь "админом для сотрудников"
        if (Auth::user()->isEmployeeAdmin()) { //
            return redirect()->back()->with('error', 'У вас нет прав для удаления категорий.'); //
        }

        $categoryModel = \App\Models\Category::where('slug', $category)->firstOrFail(); //

        if ($categoryModel->templates()->count() > 0) { //
            return back()->with('error', 'Невозможно удалить категорию со связанными шаблонами.'); //
        }

        $categoryModel->delete(); //

        return redirect()->route('admin.categories.index', ['locale' => $locale])->with('success', 'Категория удалена.'); //
    }
}
