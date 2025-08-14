@extends('layouts.app')

{{-- Устанавливаем SEO-теги из нашей модели Post --}}
@section('title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description)

@push('styles')
    <style>
        :root {
            --primary: #8b5cf6;
            --primary-hover: #7c3aed;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --blue: #06b6d4;
            --blue-dark: #0891b2;

            --bg-primary: #ffffff;
            --bg-secondary: #faf7ff;
            --bg-tertiary: #f3f0ff;
            --text-primary: #1e1b31;
            --text-secondary: #4c495d;
            --text-muted: #6b7280;
            --border: #e5e1f5;
            --shadow-sm: 0 1px 2px 0 rgb(139 92 246 / 0.05);
            --shadow: 0 4px 6px -1px rgb(139 92 246 / 0.1), 0 2px 4px -2px rgb(139 92 246 / 0.05);
            --shadow-lg: 0 10px 15px -3px rgb(139 92 246 / 0.15), 0 4px 6px -4px rgb(139 92 246 / 0.05);
            --shadow-xl: 0 20px 25px -5px rgb(139 92 246 / 0.2), 0 8px 10px -6px rgb(139 92 246 / 0.1);

            --gradient-brand: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
            --gradient-hero: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #8b5cf6 50%, #06b6d4 75%, #4facfe 100%);
            --gradient-purple: linear-gradient(135deg, #a855f7 0%, #06b6d4 100%);
            --gradient-cosmic: linear-gradient(135deg, #6366f1 0%, #8b5cf6 25%, #06b6d4 75%, #0891b2 100%);
            --glass-bg: rgba(139, 92, 246, 0.1);
            --glass-border: rgba(139, 92, 246, 0.2);
        }

        [data-bs-theme="dark"] {
            --bg-primary: #0f0a1a;
            --bg-secondary: #1a1625;
            --bg-tertiary: #252031;
            --text-primary: #f1f0ff;
            --text-secondary: #c9c6e0;
            --text-muted: #9490a8;
            --border: #2d2438;
            --shadow-sm: 0 1px 2px 0 rgb(139 92 246 / 0.3);
            --shadow: 0 4px 6px -1px rgb(139 92 246 / 0.3), 0 2px 4px -2px rgb(139 92 246 / 0.2);
            --shadow-lg: 0 10px 15px -3px rgb(139 92 246 / 0.3), 0 4px 6px -4px rgb(139 92 246 / 0.2);
            --shadow-xl: 0 20px 25px -5px rgb(139 92 246 / 0.4), 0 8px 10px -6px rgb(139 92 246 / 0.3);
            --glass-bg: rgba(139, 92, 246, 0.1);
            --glass-border: rgba(139, 92, 246, 0.2);
        }

        .modern-section {
            padding: 5rem 0;
            background: var(--bg-primary);
        }

        .modern-card {
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .template-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-brand);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .template-icon i {
            font-size: 2rem;
            color: white;
        }

        .btn-modern {
            border-radius: 16px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-modern {
            background: var(--gradient-brand);
            color: white;
            border: none;
        }

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .btn-outline-modern {
            background: transparent;
            border: 2px solid var(--border);
            color: var(--text-primary);
        }

        .btn-outline-modern:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .cosmic-border {
            border: 2px solid transparent;
            background: linear-gradient(var(--bg-primary), var(--bg-primary)) padding-box,
            var(--gradient-cosmic) border-box;
        }

        /* Стили для контента статьи */
        .article-content h1, .article-content h2, .article-content h3, .article-content h4, .article-content h5, .article-content h6 {
            color: var(--text-primary);
            font-weight: 700;
            margin-top: 1.5em;
            margin-bottom: 0.8em;
        }
        .article-content p {
            line-height: 1.7;
            margin-bottom: 1.25rem;
            color: var(--text-secondary);
        }
        .article-content a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            border-bottom: 2px solid rgba(139, 92, 246, 0.2);
            transition: all 0.2s ease-in-out;
        }
        .article-content a:hover {
            color: var(--primary-hover);
            background-color: rgba(139, 92, 246, 0.1);
        }
        .article-content ul, .article-content ol {
            padding-left: 2rem;
            margin-bottom: 1.25rem;
            color: var(--text-secondary);
        }
        .article-content blockquote {
            border-left: 4px solid var(--primary);
            padding: 0.5rem 1.5rem;
            margin: 1.5rem 0;
            background-color: var(--bg-secondary);
            color: var(--text-secondary);
            border-radius: 0 8px 8px 0;
        }
        .article-content blockquote p {
            margin-bottom: 0;
        }
        .article-content code {
            background-color: var(--bg-secondary);
            color: var(--primary);
            padding: 0.2rem 0.4rem;
            border-radius: 6px;
            font-size: 0.9em;
        }
        .article-content pre {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1rem;
            overflow-x: auto;
        }
        .article-content pre code {
            background-color: transparent;
            padding: 0;
        }
    </style>
@endpush

@section('content')
    <div class="modern-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <h1 class="fw-bolder mb-2 text-primary" style="font-size: clamp(2.2rem, 5vw, 3rem); line-height: 1.2;">{{ $post->title }}</h1>

                    @if($post->published_at)
                        <div class="text-muted fst-italic mb-5">
                            {{ __('messages.published_on') }}: {{ $post->published_at->format('d.m.Y') }}
                        </div>
                    @endif

                    <article>
                        <div class="fs-5 mb-4 article-content">
                            {!! \Illuminate\Support\Str::markdown($post->body) !!}
                        </div>
                    </article>

                    {{-- Блок с призывом к действию --}}
                    @if ($post->template)
                        <div class="modern-card my-5 cosmic-border text-center shadow-lg">
                            <div class="template-icon mx-auto mb-3">
                                <i class="bi bi-magic"></i>
                            </div>
                            <h5 class="card-title fw-bold text-primary fs-4">{{ __('messages.ready_to_create') }}</h5>
                            <p class="card-text text-secondary mt-2">{{ __('messages.article_relates_to_template', ['templateName' => $post->template->title]) }}</p>
                            <a href="{{ route('templates.show', ['locale' => app()->getLocale(), 'template' => $post->template->slug]) }}" class="btn btn-primary-modern btn-modern px-5 mt-4">
                                {{ __('messages.go_to_template') }} <i class="bi bi-arrow-right-circle-fill ms-2"></i>
                            </a>
                        </div>
                    @endif

                    <hr class="my-5">

                    <div class="text-center mt-4">
                        <a href="{{ route('posts.index', app()->getLocale()) }}" class="btn btn-outline-modern btn-modern">&larr; {{ __('messages.return_to_list') }}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
