@extends('layouts.app')

@section('title', __('messages.home') . ' - ' . config('app.name'))
@section('description', __('messages.seo_default_description'))

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

        /* Анимации */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: calc(200px + 100%) 0; }
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

        .fade-in {
            animation: fadeInUp 0.4s ease;
        }

        /* Герой секция */
        .hero-section {
            background: var(--gradient-hero);
            min-height: 70vh;
            position: relative;
            overflow: hidden;
            padding: 5rem 0;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(6, 182, 212, 0.3) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #fff 0%, rgba(255,255,255,0.9) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
        }

        .hero-search-container {
            position: relative;
            max-width: 600px;
        }

        .hero-search-input {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid  #5994fc;
            border-radius: 20px;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
        }

        .hero-search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .hero-search-input:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.1);
            background-color: transparent;
            color: white;
        }

        .hero-search-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            color: var(--primary);
            border: none;
            border-radius: 15px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .hero-search-btn:hover {
            background: var(--bg-secondary);
            transform: translateY(-50%) scale(1.05);
            color: var(--primary);
        }

        /* Современные секции */
        .modern-section {
            padding: 5rem 0;
            background: var(--bg-primary);
            transition: all 0.3s ease;
        }

        .modern-section-alt {
            background: var(--bg-secondary);
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

        /* Современные карточки */
        .modern-card {
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            height: 100%;
        }

        .modern-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-brand);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .modern-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
        }

        .modern-card:hover::before {
            opacity: 0.03;
        }

        .template-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .template-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-brand);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .template-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
        }

        .template-card:hover::before {
            opacity: 0.03;
        }

        .template-card .card-body {
            position: relative;
            z-index: 1;
            padding: 2rem;
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

        .template-icon::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: var(--gradient-brand);
            border-radius: 22px;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modern-card:hover .template-icon::before {
            opacity: 1;
        }

        .template-icon i {
            font-size: 2rem;
            color: white;
        }

        /* Пакеты документов */
        .bundle-card {
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            border-left: 5px solid transparent;
            background-image: linear-gradient(var(--bg-primary), var(--bg-primary)),
            var(--gradient-brand);
            background-origin: border-box;
            background-clip: padding-box, border-box;
        }

        .bundle-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-xl);
        }

        .blurred-content {
            filter: blur(3px);
            pointer-events: none;
            user-select: none;
            position: relative;
        }

        .blurred-content::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 40%, rgba(139, 92, 246, 0.1) 50%, transparent 60%);
            animation: shimmer 2s infinite;
        }

        /* Браузер шаблонов */
        .browser-card {
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--bg-primary);
            border: 1px solid var(--border) !important;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .browser-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-brand);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .browser-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary) !important;
        }

        .browser-card:hover::before {
            opacity: 0.03;
        }

        .browser-card .card-body {
            position: relative;
            z-index: 1;
        }

        /* Страновые карточки */
        .country-card {
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 3rem 2rem;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .country-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--gradient-brand);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .country-card:hover {
            transform: translateY(-10px) rotate(1deg);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
        }

        .country-card:hover::before {
            opacity: 0.05;
        }

        .country-flag {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            animation: float 4s ease-in-out infinite;
        }

        .country-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        /* Кнопки */
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

        .btn-pro {
            background: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
            border: none;
        }

        .btn-pro:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
            color: white;
        }

        /* Значки */
        .badge-modern {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            color: var(--primary);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* Стеклянные эффекты */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
        }

        .text-gradient {
            background: var(--gradient-brand);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Скрытые элементы */
        [x-cloak] {
            display: none !important;
        }

        /* Поисковая форма на главной */
        #searchInput:focus {
            box-shadow: none;
            border-color: #86b7fe;
        }

        .input-group-lg .form-control {
            border-radius: 20px 0 0 20px;
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .input-group-lg .btn {
            border-radius: 0 20px 20px 0;
            background: var(--gradient-brand);
            border: none;
            padding: 1rem 2rem;
        }

        .input-group-lg .btn:hover {
            background: var(--gradient-brand);
            transform: scale(1.02);
        }

        /* Accordion стили */
        .accordion-button:not(.collapsed) {
            color: var(--primary);
            background-color: rgba(139, 92, 246, 0.1);
            border-color: var(--primary);
        }

        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(139, 92, 246, 0.25);
            border-color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .modern-section {
                padding: 3rem 0;
            }

            .modern-section-title {
                font-size: 2rem;
            }

            .country-card {
                padding: 2rem 1.5rem;
            }

            .hero-section {
                min-height: 60vh;
                padding: 3rem 0;
            }
        }

        /* Дополнительные утилиты */
        .purple-glow {
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.3);
        }

        .cosmic-border {
            border: 2px solid transparent;
            background: linear-gradient(var(--bg-primary), var(--bg-primary)) padding-box,
            var(--gradient-cosmic) border-box;
        }

        .animated-gradient {
            background: linear-gradient(-45deg, #8b5cf6, #06b6d4, #10b981, #6366f1);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }
        /* Базовые стили для значка доступа */
        .access-badge {
            display: inline-block;
            padding: 0.3em 0.8em;
            font-size: 0.8rem;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 50px;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        /* ✅ НОВЫЕ СТИЛИ ГРАДИЕНТОВ ДЛЯ ЗНАЧКОВ */

        /* ALL: синеватый с каплей фиолетового */
        .access-badge.all {
            background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
        }

        /* STANDARD: больше фиолетового с примесью синего */
        .access-badge.standard {
            background: linear-gradient(135deg, #d946ef 0%, #8b5cf6 100%);
        }

        /* PRO: как и был */
        .access-badge.pro {
            background: linear-gradient(135deg, #d25ffb 0%, #fd836d 100%) !important;
        }

        /* ✅ НОВЫЕ СТИЛИ ГРАДИЕНТОВ ДЛЯ КНОПОК */

        /* Кнопка для PRO (как и была btn-pro) */
        .btn-pro-locked {

            background: linear-gradient(135deg, #d25ffb 0%, #fd836d 100%) !important;
        }

        /* Кнопка для Standard */
        .btn-standard-locked {
            background: linear-gradient(135deg, #d946ef 0%, #8b5cf6 100%);
        }
    </style>
@endpush

@push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
@endpush

@section('content')
    {{-- Современный Hero-блок --}}
    <div class="hero-section">
        <div class="container col-xxl-8 px-4">
            <div class="row flex-lg-row-reverse align-items-center g-5">
                <div class="col-10 col-sm-8 col-lg-6 text-center">
                    <div class="float">
                        <svg class="d-block mx-lg-auto img-fluid" width="400" height="300" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg">
                            <!-- Фон документа -->
                            <rect x="80" y="40" width="240" height="220" rx="16" fill="var(--bg-primary)" stroke="var(--border)" stroke-width="2"/>

                            <!-- Загнутый угол -->
                            <path d="M280,40 L280,80 L320,80 Z" fill="var(--bg-secondary)" stroke="var(--border)" stroke-width="2"/>

                            <!-- Линии текста -->
                            <rect x="100" y="80" width="180" height="8" rx="4" fill="#8b5cf6" opacity="0.8"/>
                            <rect x="100" y="100" width="160" height="6" rx="3" fill="#06b6d4" opacity="0.6"/>
                            <rect x="100" y="115" width="140" height="6" rx="3" fill="#6b7280" opacity="0.6"/>
                            <rect x="100" y="130" width="170" height="6" rx="3" fill="#6b7280" opacity="0.6"/>

                            <!-- Подпись -->
                            <rect x="200" y="200" width="80" height="2" fill="#8b5cf6"/>

                            <!-- Декоративные элементы -->
                            <circle cx="50" cy="100" r="30" fill="#8b5cf6" opacity="0.1"/>
                            <circle cx="350" cy="200" r="25" fill="#06b6d4" opacity="0.1"/>
                        </svg>
                    </div>
                </div>
                <div class="col-lg-6 hero-content">
                    <div class="fade-in-up">
                        <h1 class="hero-title">{{ __('messages.hero_title') }}</h1>
                        <p class="hero-subtitle">{{ __('messages.hero_subtitle') }}</p>

                        <form action="{{ route('home', app()->getLocale()) }}" method="GET" class="hero-search-container mt-4">
                            <input id="searchInput" type="search" name="q" class="hero-search-input" placeholder="{{ __('messages.search_placeholder') }}" value="{{ $searchQuery ?? '' }}">
                            <button class="hero-search-btn" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!$searchQuery)
        {{-- Популярные шаблоны --}}
        @if($popularTemplates?->isNotEmpty())
            <div class="modern-section" id="popular">
                <div class="container px-4">
                    <h2 class="modern-section-title">{{ __('messages.popular_templates') }}</h2>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                        @foreach($popularTemplates as $template)
                            <div class="col">
                                <a href="{{ route('documents.show', ['locale' => app()->getLocale(), 'countryCode' => $template->country_code, 'templateSlug' => $template->slug]) }}" class="card template-card h-100 text-decoration-none text-dark shadow-sm">
                                    <div class="card-body text-center">
                                        <div class="template-icon">
                                            <i class="bi bi-file-earmark-text"></i>
                                        </div>
                                        <h6 class="card-title fw-bold">{{ $template->title }}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- Блок пакетов --}}
        @if(!empty($bundlesByCountry) && $bundlesByCountry->isNotEmpty())
            <div class="modern-section modern-section-alt" id="bundles">
                <div class="container px-4">
                    <h2 class="modern-section-title">{{ __('messages.popular_bundles_title') }}</h2>
                    <div class="row row-cols-1 row-cols-lg-2 g-4">
                        @foreach($bundlesByCountry->flatten()->take(4) as $bundle)
                            <div class="col">
                                <div class="bundle-card h-100">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge-modern">
                                    {{ $countryNames[$bundle->country_code][$locale] ?? $bundle->country_code }}
                                </span>

                                        {{-- ✅ НАЧАЛО: Логика для отображения значков с новыми стилями и переводами --}}
                                        @if($bundle->access_level == 'pro')
                                            <span class="access-badge pro">{{ __('messages.plan_pro') }}</span>
                                        @elseif($bundle->access_level == 'standard')
                                            <span class="access-badge standard">{{ __('messages.plan_standard') }}</span>
                                        @else
                                            <span class="access-badge all">{{ __('messages.plan_all') }}</span>
                                        @endif
                                        {{-- ✅ КОНЕЦ: Логика для значков --}}
                                    </div>

                                    <h4 class="fw-bold mb-3">{{ $bundle->title }}</h4>

                                    @php
                                        $hasAccess = false; // По умолчанию доступа нет
                                        if ($bundle->access_level == 'all') {
                                            // Если пакет для всех, даем доступ
                                            $hasAccess = true;
                                        } elseif (Auth::check()) {
                                            // Если пользователь залогинен, проверяем его права
                                            $hasAccess = Auth::user()->canAccessBundle($bundle);
                                        }
                                    @endphp

                                    <div class="flex-grow-1 @if(!$hasAccess) blurred-content @endif">
                                        <p class="mb-2 small"><strong>{{ __('messages.bundle_includes') }}</strong></p>
                                        <ul class="list-unstyled">
                                            @foreach ($bundle->templates->take(5) as $templateInBundle)
                                                <li class="mb-1 small"><i class="bi bi-check-lg text-success"></i> {{ $templateInBundle->title }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    @if($hasAccess)
                                        <a href="{{ route('bundles.show', ['locale' => $locale, 'bundle' => $bundle->slug]) }}" class="btn btn-primary-modern btn-modern w-100 mt-auto">
                                            <i class="bi bi-magic"></i> {{ __('messages.fill_bundle') }}
                                        </a>
                                    @else
                                        {{-- ✅ НАЧАЛО: Логика для отображения правильной кнопки для заблокированного контента --}}
                                        @if($bundle->access_level == 'standard')
                                            <a href="{{ route('pricing', $locale) }}" class="btn btn-standard-locked btn-modern w-100 mt-auto">
                                                <i class="bi bi-gem"></i> {{ __('messages.available_in_standard_or_pro') }}
                                            </a>
                                        @else
                                            <a href="{{ route('pricing', $locale) }}" class="btn btn-pro-locked btn-modern w-100 mt-auto">
                                                <i class="bi bi-gem"></i> {{ __('messages.available_in_pro') }}
                                            </a>
                                        @endif
                                        {{-- ✅ КОНЕЦ: Логика для кнопок --}}
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-5">
                        <a href="{{ route('bundles.index', $locale) }}" class="btn btn-outline-modern btn-modern btn-lg cosmic-border">
                            {{ __('messages.view_all_bundles') }}
                        </a>
                    </div>
                </div>
            </div>
        @endif

        {{-- Браузер шаблонов (Alpine.js) --}}
        <div class="modern-section" id="templates-browser" x-cloak
             x-data="templateBrowser({
                data: {{ Js::from($dataByCountry) }},
                countries: {{ Js::from($countries) }},
                locale: '{{ app()->getLocale() }}',
                routes: { show: '{{ route('documents.show', ['locale' => '__LCL__', 'countryCode' => '__CC__', 'templateSlug' => '__SLG__']) }}' }
             })">

            <div class="container px-4">
                <div class="text-center mb-5">
                    <h2 class="modern-section-title" x-show="!selectedCountry">{{ __('messages.template_catalog') }}</h2>
                    <div x-show="selectedCountry" class="fade-in">
                        <h2 class="modern-section-title">
                            <span x-text="selectedCountry?.name.toUpperCase()"></span>
                            <template x-if="selectedCategory">
                                <span><span class="mx-2 text-muted">&raquo;</span><span x-text="selectedCategory.name"></span></span>
                            </template>
                        </h2>
                        <button @click="selectedCategory ? resetCategory() : resetCountry()" class="btn btn-sm btn-outline-modern mt-2">
                            <i class="bi bi-arrow-left"></i> {{ __('messages.back') }}
                        </button>
                    </div>
                </div>

                <!-- Список стран -->
                <div x-show="!selectedCountry" class="row row-cols-1 row-cols-md-3 g-4 fade-in">
                    <template x-for="country in countries" :key="country.code">
                        <div class="col">
                            <div @click="selectCountry(country)" class="country-card">
                                <div class="country-flag" x-text="country.code === 'UA' ? '🇺🇦' : (country.code === 'PL' ? '🇵🇱' : '🇩🇪')"></div>
                                <h4 class="country-name" x-text="country.name"></h4>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Список категорий -->
                <div x-show="selectedCountry && !selectedCategory" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 fade-in">
                    <template x-for="category in categoriesForSelectedCountry" :key="category.id">
                        <div class="col d-flex">
                            <div @click="selectCategory(category)" class="browser-card w-100">
                                <div class="card-body d-flex align-items-center p-4">
                                    <div class="template-icon me-3" style="width: 60px; height: 60px; min-width: 60px;">
                                        <i class="bi bi-folder2-open" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <h6 class="card-title mb-0 fw-bold" x-text="category.name"></h6>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Список шаблонов -->
                <div x-show="selectedCategory" class="row row-cols-1 row-cols-md-2 g-4 fade-in">
                    <template x-for="template in templatesForSelectedCategory" :key="template.id">
                        <div class="col">
                            <a :href="templateUrl(template)" class="browser-card h-100 text-decoration-none text-dark">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start">
                                        <div class="template-icon me-3" style="width: 60px; height: 60px; min-width: 60px;">
                                            <i class="bi bi-file-earmark-text" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="card-title text-primary fw-bold mb-2" x-text="template.title"></h6>
                                            <p class="card-text small text-muted mb-0" x-text="template.description"></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    @else
        {{-- Результаты поиска --}}
        <div class="modern-section">
            <div class="container px-4">
                <div class="pb-2 mb-4 border-bottom">
                    <h2 class="modern-section-title text-start">{{ __('messages.search_results_for', ['query' => $searchQuery]) }}</h2>
                </div>

                @if($searchResults && $searchResults->count() > 0)
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach($searchResults as $template)
                            <div class="col">
                                <div class="modern-card h-100">
                                    <div class="d-flex align-items-start">
                                        <div class="template-icon me-3" style="width: 60px; height: 60px; min-width: 60px;">
                                            <i class="bi bi-file-earmark-text" style="font-size: 1.5rem;"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            @if(isset($countryNames[$template->country_code]))
                                                <p class="card-subtitle mb-2 text-muted fw-bold small">
                                                    {{ $countryNames[$template->country_code][$locale] ?? $countryNames[$template->country_code]['en'] }}
                                                </p>
                                            @endif
                                            <h5 class="card-title mb-2">
                                                <a href="{{ route('documents.show', ['locale' => app()->getLocale(), 'countryCode' => $template->country_code, 'templateSlug' => $template->slug]) }}"
                                                   class="text-decoration-none text-primary fw-bold">{{ $template->title }}</a>
                                            </h5>
                                            <p class="card-text text-muted">{{ $template->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="template-icon mx-auto mb-4 animated-gradient">
                            <i class="bi bi-search" style="font-size: 2rem;"></i>
                        </div>
                        <h4 class="text-muted">{{ __('messages.no_results_found') }}</h4>
                        <p class="text-muted">Спробуйте змінити параметри пошуку</p>
                    </div>
                @endif

                <div class="text-center mt-5">
                    <a href="{{ route('home', app()->getLocale()) }}" class="btn btn-primary-modern btn-modern">
                        <i class="bi bi-arrow-left me-2"></i>{{ __('messages.clear_search_and_return') }}
                    </a>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('templateBrowser', (config) => ({
                data: config.data,
                countries: config.countries,
                routes: config.routes,
                locale: config.locale,
                selectedCountry: null,
                selectedCategory: null,

                get categoriesForSelectedCountry() {
                    if (!this.selectedCountry) return [];
                    return this.data[this.selectedCountry.code] || [];
                },
                get templatesForSelectedCategory() {
                    if (!this.selectedCategory) return [];
                    return this.selectedCategory.templates || [];
                },
                templateUrl(template) {
                    return this.routes.show
                        .replace('__LCL__', this.locale)
                        .replace('__CC__', template.country_code)
                        .replace('__SLG__', template.slug);
                },
                selectCountry(country) {
                    this.selectedCountry = country;
                },
                selectCategory(category) {
                    this.selectedCategory = category;
                },
                resetCountry() {
                    this.selectedCountry = null;
                    this.selectedCategory = null;
                },
                resetCategory() {
                    this.selectedCategory = null;
                }
            }));
        });

        // Анимации при скролле
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Применяем анимации к карточкам
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.modern-card, .country-card, .browser-card, .template-card, .bundle-card').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(30px)';
                el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                observer.observe(el);
            });
        });

        // Плавная прокрутка для якорных ссылок
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Эффект печатания для заголовка (опционально)
        function typeWriter(element, text, speed = 100) {
            let i = 0;
            element.innerHTML = '';

            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }

            type();
        }

        // Запуск анимации печатания после загрузки (опционально)
        window.addEventListener('load', () => {
            const heroTitle = document.querySelector('.hero-title');
            if (heroTitle) {
                const originalText = heroTitle.textContent;
                setTimeout(() => {
                    // Раскомментируйте, если хотите эффект печатания
                    // typeWriter(heroTitle, originalText, 80);
                }, 500);
            }
        });
    </script>
@endpush
