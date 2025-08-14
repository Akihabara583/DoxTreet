@extends('layouts.app')

@section('title', __('messages.blog') . ' - ' . config('app.name'))

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
            transition: all 0.3s ease;
        }

        .modern-section-title {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
            color: var(--text-primary);
        }

        .modern-section-title::after {
            content: '';
            position: absolute;
            bottom: -1rem;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient-brand);
            border-radius: 2px;
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

        .modern-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
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

        .animated-gradient {
            background: linear-gradient(-45deg, #8b5cf6, #06b6d4, #10b981, #6366f1);
            background-size: 400% 400%;
        }
    </style>
@endpush

@section('content')
    <div class="modern-section">
        <div class="container">
            <h1 class="modern-section-title mb-5">{{ __('messages.our_blog') }}</h1>

            @if($posts->isNotEmpty())
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($posts as $post)
                        <div class="col">
                            {{-- Added h-100 and flex classes to ensure uniform card layout --}}
                            <div class="modern-card shadow-sm h-100 d-flex flex-column">
                                {{-- This div grows to push the button to the bottom --}}
                                <div class="flex-grow-1">
                                    <h2 class="card-title h4">
                                        <a href="{{ route('posts.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="text-decoration-none text-primary fw-bold">{{ $post->title }}</a>
                                    </h2>
                                    @if($post->published_at)
                                        <p class="text-muted small mb-3">
                                            {{ __('messages.published_on') }}: {{ $post->published_at->format('d.m.Y') }}
                                        </p>
                                    @endif
                                    <p class="card-text text-secondary">
                                        {{ Str::limit(strip_tags($post->body), 200) }}
                                    </p>
                                </div>
                                {{-- The button now aligns to the bottom-left of the card --}}
                                <a href="{{ route('posts.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="btn btn-outline-modern btn-sm mt-4">{{ __('messages.read_more') }} &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5 col-lg-6 mx-auto">
                    <div class="template-icon mx-auto mb-4 animated-gradient">
                        <i class="bi bi-journal-x"></i>
                    </div>
                    <h4 class="text-primary">{{ __('messages.no_articles_yet') }}</h4>
                    <p class="text-muted">{{ __('messages.check_back_later') }}</p>
                </div>
            @endif

            @if ($posts->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $posts->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
