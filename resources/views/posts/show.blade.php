@extends('layouts.app')

{{-- Устанавливаем SEO-теги из нашей модели Post --}}
@section('title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description)

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <!-- Заголовок статьи -->
                <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>

                <!-- Мета-информация -->
                @if($post->published_at)
                    <div class="text-muted fst-italic mb-4">
                        {{ __('messages.published_on') }}: {{ $post->published_at->format('d.m.Y') }}
                    </div>
                @endif

                <!-- Основной текст статьи -->
                <article>
                    <div class="fs-5 mb-4">
                        {!! \Illuminate\Support\Str::markdown($post->body) !!}
                    </div>
                </article>

                {{-- Блок с призывом к действию --}}
                @if ($post->template)
                    <div class="card bg-primary text-white my-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('messages.ready_to_create') }}</h5>
                            <p class="card-text">{{ __('messages.article_relates_to_template', ['templateName' => $post->template->title]) }}</p>
                            <a href="{{ route('templates.show', ['locale' => app()->getLocale(), 'template' => $post->template->slug]) }}" class="btn btn-light fw-bold px-4">
                                {{ __('messages.go_to_template') }} <i class="bi bi-arrow-right-circle-fill ms-2"></i>
                            </a>
                        </div>
                    </div>
                @endif

                <hr>

                <div class="text-center mt-4">
                    <a href="{{ route('posts.index', app()->getLocale()) }}" class="btn btn-secondary">&larr; {{ __('messages.return_to_list') }}</a>
                </div>

            </div>
        </div>
    </div>
@endsection
