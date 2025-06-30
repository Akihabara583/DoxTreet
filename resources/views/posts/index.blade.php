@extends('layouts.app')

@section('title', 'Блог - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="mb-4">Наш Блог</h1>

                @forelse ($posts as $post)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title h4">
                                {{-- --- ИСПРАВЛЕНИЕ ЗДЕСЬ --- --}}
                                {{-- Мы меняем 'post' => $post->slug на 'slug' => $post->slug --}}
                                <a href="{{ route('posts.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                            </h2>
                            <p class="text-muted">
                                Опубликовано: {{ $post->published_at->format('d.m.Y') }}
                            </p>
                            <p class="card-text">
                                {{ Str::limit(strip_tags($post->body), 200) }}
                            </p>
                            {{-- И здесь тоже исправляем --}}
                            <a href="{{ route('posts.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="btn btn-primary">Читать далее &rarr;</a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        Статей пока нет.
                    </div>
                @endforelse

                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
