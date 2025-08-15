@extends('layouts.app')

@section('title', __('messages.docs_for') . ' ' . $countryName . ' - ' . config('app.name'))

@section('content')
    {{-- СТИЛИ ТЕПЕРЬ НАХОДЯТСЯ ЗДЕСЬ, ЧТОБЫ ОНИ 100% ПРИМЕНИЛИСЬ --}}
    <style>
        :root {
            --primary: #8b5cf6;
            --bg-primary: #ffffff;
            --bg-secondary: #faf7ff;
            --text-primary: #1e1b31;
            --text-secondary: #4c495d;
            --border: #e5e1f5;
            --shadow-xl: 0 20px 25px -5px rgb(139 92 246 / 0.2), 0 8px 10px -6px rgb(139 92 246 / 0.1);
            --gradient-brand: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
        }
        [data-bs-theme="dark"] {
            --bg-primary: #0f0a1a;
            --bg-secondary: #1a1625;
            --text-primary: #f1f0ff;
            --text-secondary: #c9c6e0;
            --border: #2d2438;
        }

        .page-layout {
            padding: 4rem 0;
            background-color: var(--bg-secondary);
        }
        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--text-primary);
        }
        .page-subtitle {
            font-size: 1.25rem;
            color: var(--text-secondary);
        }
        .category-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary);
        }
        /* Стилизуем оригинальную карточку */
        .card.shadow-sm {
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 20px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .card.shadow-sm:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl) !important;
            border-color: var(--primary);
        }
        /* ГЛАВНОЕ ИСПРАВЛЕНИЕ: Стилизуем оригинальную кнопку */
        .card .btn-outline-primary {
            border-radius: 16px;
            padding: 0.5rem 1rem; /* Размер btn-sm */
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            background: var(--gradient-brand);
            color: white;
        }
        .card .btn-outline-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }
    </style>

    <div class="page-layout">
        <div class="container">
            <div class="text-center mb-5">
                <h1 class="page-title">{{ __('messages.template_catalog') }}</h1>
                <p class="page-subtitle">{{ __('messages.docs_for') }} {{ $countryName }}</p>
            </div>

            @if($categories->isEmpty())
                <p class="text-center text-muted mt-5">{{ __('messages.no_templates_for_country') }}</p>
            @else
                @foreach($categories as $category)
                    <div class="mb-5">
                        <h2 class="category-title mb-4">{{ $category->name }}</h2>
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach($category->templates as $template)
                                <div class="col">
                                    {{-- Я НЕ МЕНЯЛ HTML-СТРУКТУРУ, ТОЛЬКО ДОБАВИЛ СТИЛИ ВЫШЕ --}}
                                    <div class="card h-100 shadow-sm border-light">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $template->title }}</h5>
                                            <p class="card-text small text-muted flex-grow-1">{{ $template->description }}</p>
                                            <a href="{{ route('documents.show', ['locale' => $currentLocale, 'countryCode' => $template->country_code, 'templateSlug' => $template->slug]) }}" class="btn btn-outline-primary btn-sm mt-auto align-self-start">
                                                {{ __('messages.fill_out') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
