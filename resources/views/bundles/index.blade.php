@extends('layouts.app')

@section('title', __('messages.bundles_page_title') . ' - ' . config('app.name'))

@push('styles')
    <style>
        :root {
            --primary: #8b5cf6;
            --primary-hover: #7c3aed;
            --bg-primary: #ffffff;
            --bg-secondary: #faf7ff;
            --text-primary: #1e1b31;
            --text-secondary: #4c495d;
            --text-muted: #6b7280;
            --border: #e5e1f5;
            --shadow-sm: 0 1px 2px 0 rgb(139 92 246 / 0.05);
            --shadow-lg: 0 10px 15px -3px rgb(139 92 246 / 0.15), 0 4px 6px -4px rgb(139 92 246 / 0.05);
            --shadow-xl: 0 20px 25px -5px rgb(139 92 246 / 0.2), 0 8px 10px -6px rgb(139 92 246 / 0.1);
            --gradient-brand: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
        }

        [data-bs-theme="dark"] {
            --bg-primary: #0f0a1a;
            --bg-secondary: #1a1625;
            --text-primary: #f1f0ff;
            --text-secondary: #c9c6e0;
            --text-muted: #9490a8;
            --border: #2d2438;
        }

        .modern-section {
            padding: 5rem 0;
            background-color: var(--bg-secondary);
        }

        .modern-section-title {
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 1rem;
            position: relative;
            color: var(--text-primary);
        }

        .modern-section-subtitle {
            font-size: 1.1rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto 4rem auto;
        }

        .modern-accordion .accordion-item {
            background-color: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 24px !important;
            margin-bottom: 1rem;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
        }

        .modern-accordion .accordion-header {
            border-bottom: 1px solid var(--border);
        }

        .modern-accordion .accordion-button {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-weight: 700;
            font-size: 1.25rem;
            border-radius: 24px 24px 0 0 !important;
        }

        .modern-accordion .accordion-button:not(.collapsed) {
            color: var(--primary);
            background-color: var(--bg-secondary);
            box-shadow: none;
        }

        .modern-accordion .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(139, 92, 246, 0.25);
            border-color: var(--primary);
        }

        .modern-accordion .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%236b7280'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        [data-bs-theme="dark"] .modern-accordion .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%239490a8'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .bundle-card {
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .bundle-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary);
        }

        .blurred-content {
            filter: blur(4px);
            pointer-events: none;
            user-select: none;
            opacity: 0.7;
        }

        .btn-modern {
            border-radius: 16px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            color: white;
        }

        .btn-modern:hover {
            color: white;
            transform: translateY(-3px);
        }

        .btn-primary-modern {
            background: var(--gradient-brand);
        }
        .btn-primary-modern:hover {
            box-shadow: var(--shadow-lg);
        }

        /* Стили для кнопок заблокированного контента из home.blade.php */
        .btn-pro-locked {
            background: linear-gradient(135deg, #d25ffb 0%, #fd836d 100%) !important;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }
        .btn-pro-locked:hover {
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }

        .btn-standard-locked {
            background: linear-gradient(135deg, #d946ef 0%, #8b5cf6 100%);
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }
        .btn-standard-locked:hover {
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
        }

        /* Стили для значков доступа из home.blade.php */
        .access-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 0.75rem;
            font-weight: bold;
            padding: 0.3em 0.7em;
            border-radius: 50px;
            color: white;
        }
        .access-badge.pro {
            background: linear-gradient(135deg, #d25ffb 0%, #fd836d 100%) !important;
        }
        .access-badge.standard {
            background: linear-gradient(135deg, #d946ef 0%, #8b5cf6 100%);
        }
        .access-badge.all {
            background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
        }
    </style>
@endpush

@section('content')
    <div class="modern-section">
        <div class="container">
            <div class="text-center">
                <h1 class="modern-section-title">{{ __('messages.bundles_page_title') }}</h1>
                <p class="modern-section-subtitle">{{ __('messages.bundles_page_subtitle') }}</p>
            </div>

            @if($bundlesByCountry->isNotEmpty())
                <div class="accordion modern-accordion" id="bundlesAccordion">
                    @foreach($bundlesByCountry as $countryCode => $bundles)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $countryCode }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $countryCode }}">
                                    <span class="me-3">{{ $countryCode === 'UA' ? '🇺🇦' : ($countryCode === 'PL' ? '🇵🇱' : '🇩🇪') }}</span>
                                    {{ __('messages.bundles_for_country', ['country' => $countryNames[$countryCode][$locale] ?? $countryCode]) }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $countryCode }}" class="accordion-collapse collapse" data-bs-parent="#bundlesAccordion">
                                <div class="accordion-body">
                                    <div class="row row-cols-1 row-cols-lg-2 g-4 py-3">
                                        @foreach($bundles as $bundle)
                                            @php
                                                $hasAccess = false;
                                                if ($bundle->access_level == 'all') {
                                                    $hasAccess = true;
                                                } elseif (Auth::check()) {
                                                    $hasAccess = Auth::user()->canAccessBundle($bundle);
                                                }
                                            @endphp
                                            <div class="col">
                                                <div class="bundle-card">
                                                    {{-- Логика для значков с ключами перевода из home.blade.php --}}
                                                    @if($bundle->access_level == 'pro')
                                                        <span class="access-badge pro">{{ __('messages.plan_pro') }}</span>
                                                    @elseif($bundle->access_level == 'standard')
                                                        <span class="access-badge standard">{{ __('messages.plan_standard') }}</span>
                                                    @else
                                                        <span class="access-badge all">{{ __('messages.plan_all') }}</span>
                                                    @endif

                                                    <h4 class="card-title fw-bold mb-3" style="color: var(--text-primary);">{{ $bundle->title }}</h4>
                                                    <p class="mb-3 small"><strong>{{ __('messages.bundle_includes') }}</strong></p>

                                                    <ul class="list-unstyled mb-4 flex-grow-1 @if(!$hasAccess) blurred-content @endif">
                                                        @foreach ($bundle->templates as $templateInBundle)
                                                            <li class="mb-2" style="color: var(--text-secondary);"><i class="bi bi-check-lg" style="color: var(--primary);"></i> {{ $templateInBundle->title }}</li>
                                                        @endforeach
                                                    </ul>

                                                    @if($hasAccess)
                                                        <a href="{{ route('bundles.show', ['locale' => $locale, 'bundle' => $bundle->slug]) }}" class="btn btn-primary-modern btn-modern mt-auto">
                                                            <i class="bi bi-magic"></i> {{ __('messages.fill_bundle') }}
                                                        </a>
                                                    @else
                                                        {{-- Логика для кнопок и ключей перевода из home.blade.php --}}
                                                        @if($bundle->access_level == 'standard')
                                                            <a href="{{ route('pricing', $locale) }}" class="btn btn-standard-locked btn-modern mt-auto">
                                                                <i class="bi bi-gem"></i> {{ __('messages.available_in_standard_or_pro') }}
                                                            </a>
                                                        @else
                                                            <a href="{{ route('pricing', $locale) }}" class="btn btn-pro-locked btn-modern mt-auto">
                                                                <i class="bi bi-gem"></i> {{ __('messages.available_in_pro') }}
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <p class="lead" style="color: var(--text-muted);">{{ __('messages.no_bundles_available') }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
