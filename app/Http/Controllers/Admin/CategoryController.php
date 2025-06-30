<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'slug' => 'required|alpha_dash|unique:categories,slug,' . $category->id,
            'name_en' => 'required|string|max:255',
            'name_uk' => 'required|string|max:255',
            'name_pl' => 'required|string|max:255',
        ]);

        $category->update(['slug' => $request->slug]);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated. Please update translations in lang files if slug changed.');
    }

    public function destroy(Category $category)
    {
        // Add logic to check if category has templates before deleting
        if ($category->templates()->count() > 0) {
            return back()->with('error', 'Cannot delete category with associated templates.');
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
