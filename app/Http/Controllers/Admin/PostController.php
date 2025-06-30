<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $templates = Template::all();
        return view('admin.posts.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'template_id' => 'nullable|exists:templates,id',
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
            'template_id' => $request->template_id,
        ]);

        return redirect()->route('admin.posts.index', ['locale' => app()->getLocale()])->with('success', 'Статья успешно создана.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $locale, string $post)
    {
        $post = Post::findOrFail($post);
        $templates = Template::all();
        return view('admin.posts.edit', compact('post', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     * --- ИСПРАВЛЕНИЕ ЗДЕСЬ ---
     * Мы находим пост по его slug, а не по ID.
     */
    public function update(Request $request, string $locale, string $post)
    {
        // Находим статью по ее 'slug', который пришел из URL
        $postModel = Post::where('slug', $post)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'template_id' => 'nullable|exists:templates,id',
        ]);

        $postModel->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') && !$postModel->is_published ? now() : $postModel->published_at,
            'template_id' => $request->template_id,
        ]);

        return redirect()->route('admin.posts.index', ['locale' => app()->getLocale()])->with('success', 'Статья успешно обновлена.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $locale, string $post)
    {
        $post = Post::findOrFail($post);
        $post->delete();
        return redirect()->route('admin.posts.index', ['locale' => app()->getLocale()])->with('success', 'Статья успешно удалена.');
    }
}
