<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the published posts.
     */
    public function index(): View
    {
        $posts = Post::where('is_published', true)
            ->latest('published_at')
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified post.
     *
     * --- ФИНАЛЬНОЕ ИСПРАВЛЕНИЕ ---
     * Метод теперь принимает оба параметра из URL: $locale и $slug.
     *
     * @param  string  $locale
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show(string $locale, string $slug): View
    {
        // Ищем опубликованную статью по ее 'slug'.
        // Если не найдена - Laravel автоматически вернет ошибку 404.
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('posts.show', compact('post'));
    }
}
