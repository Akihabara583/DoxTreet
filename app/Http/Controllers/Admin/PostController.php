<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all()->groupBy('country_code');
        $post = new Post();
        return view('admin.posts.create', compact('post', 'categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title.uk' => 'required|string|max:255',
            'body.uk' => 'required|string',
            'template_id' => 'nullable|exists:templates,id',
        ];

        $attributes = [
            'title.uk' => 'Заголовок статьи (UK)',
            'body.uk' => 'Текст статьи (UK)',
        ];

        $request->validate($rules, [], $attributes);

        $post = new Post();
        $post->fill($request->only(['title', 'body', 'meta_title', 'meta_description']));
        $post->slug = Str::slug($request->input('title.uk'));
        $post->is_published = $request->has('is_published');
        $post->published_at = $request->has('is_published') ? now() : null;
        $post->template_id = $request->template_id;

        $post->save();

        return redirect()->route('admin.posts.index', ['locale' => app()->getLocale()])->with('success', 'Статья успешно создана.');
    }

    /**
     * Ищем пост по ID или slug.
     */
    public function edit(string $locale, $identifier)
    {
        $post = is_numeric($identifier)
            ? Post::findOrFail($identifier)
            : Post::where('slug', $identifier)->firstOrFail();

        $categories = Category::all()->groupBy('country_code');
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Ищем пост для обновления по ID или slug.
     */
    public function update(Request $request, string $locale, $identifier)
    {
        $post = is_numeric($identifier)
            ? Post::findOrFail($identifier)
            : Post::where('slug', $identifier)->firstOrFail();

        $rules = [
            'title.uk' => 'required|string|max:255',
            'body.uk' => 'required|string',
            'template_id' => 'nullable|exists:templates,id',
        ];

        $attributes = [
            'title.uk' => 'Заголовок статьи (UK)',
            'body.uk' => 'Текст статьи (UK)',
        ];

        $request->validate($rules, [], $attributes);

        $post->fill($request->only(['title', 'body', 'meta_title', 'meta_description']));
        $post->slug = Str::slug($request->input('title.uk'));
        $post->is_published = $request->has('is_published');
        $post->published_at = $request->has('is_published') && !$post->is_published ? now() : $post->published_at;
        $post->template_id = $request->template_id;

        $post->save();

        return redirect()->route('admin.posts.index', ['locale' => app()->getLocale()])->with('success', 'Статья успешно обновлена.');
    }

    /**
     * Ищем пост для удаления по ID или slug.
     */
    public function destroy(string $locale, $identifier)
    {
        $post = is_numeric($identifier)
            ? Post::findOrFail($identifier)
            : Post::where('slug', $identifier)->firstOrFail();

        if (Auth::user()->isEmployeeAdmin()) {
            return redirect()->back()->with('error', 'У вас нет прав для удаления статей.');
        }

        $post->delete();

        return redirect()->route('admin.posts.index', ['locale' => app()->getLocale()])->with('success', 'Статья успешно удалена.');
    }

    public function getTemplatesByCategory(Request $request)
    {
        $request->validate(['category_id' => 'required|exists:categories,id']);

        $templates = Template::with('translation')
            ->where('category_id', $request->category_id)
            ->get();

        return response()->json($templates);
    }
}
