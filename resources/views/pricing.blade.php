@extends('layouts.app')

@section('title', __('messages.pricing_title') . ' - ' . config('app.name'))
@section('description', __('messages.pricing_seo_description'))

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

        .plan-card {
            background: var(--bg-primary);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2.5rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .plan-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .plan-card.highlight {
            border-color: var(--primary);
            box-shadow: var(--shadow-lg);
            transform: translateY(-5px) scale(1.02);
        }

        .plan-card.current-plan {
            background-color: var(--bg-tertiary);
            border-color: var(--primary);
        }

        .plan-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--gradient-brand);
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            text-transform: uppercase;
        }

        .plan-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .plan-price {
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1;
        }

        .plan-price .currency {
            font-size: 1.5rem;
            vertical-align: super;
            margin-right: 0.25rem;
        }

        .plan-price .period {
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-muted);
        }

        .plan-features {
            list-style: none;
            padding: 0;
            margin: 2rem 0;
            text-align: left;
            flex-grow: 1;
        }

        .plan-features li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: var(--text-secondary);
        }

        .plan-features i {
            font-size: 1.25rem;
            margin-right: 1rem;
            width: 24px;
        }

        .feature-icon-plus { color: var(--primary); }
        .feature-icon-minus { color: var(--text-muted); }

        .btn-modern {
            border-radius: 16px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            position: relative;
            overflow: hidden;
            width: 100%;
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

        .limit-reset-card {
            background-color: var(--bg-tertiary);
            border: 1px dashed var(--primary);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <div class="modern-section">
        <div class="container">
            <div class="text-center">
                <h1 class="modern-section-title">{{ __('messages.pricing_title') }}</h1>
                <p class="modern-section-subtitle">{{ __('messages.pricing_subtitle') }}</p>
            </div>

            <div class="row row-cols-1 row-cols-lg-3 g-4 justify-content-center">

                {{-- План "База" --}}
                <div class="col">
                    <div class="plan-card h-100 @if($currentPlan == 'base') current-plan @endif">
                        <h3 class="plan-title">{{ __('messages.plan_base_title') }}</h3>
                        <div class="mb-4">
                            <span class="plan-price"><span class="currency">$</span>0</span>
                            <span class="period">/ {{ __('messages.per_month') }}</span>
                        </div>

                        <ul class="plan-features">
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_base_feature1', ['count' => config('subscriptions.plans.base.daily_download_limit')]) !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_base_feature2', ['count' => config('subscriptions.plans.base.daily_signature_limit')]) !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_base_feature4') !!}</li>
                            <li class="text-muted"><i class="bi bi-x-circle-fill feature-icon-minus"></i>{!! __('messages.plan_base_feature_no_branding_disabled') !!}</li>
                        </ul>

                        @auth
                            @if(empty(auth()->user()->subscription_plan) || auth()->user()->subscription_plan == 'base')
                                <div class="limit-reset-card mb-3">
                                    <h5 class="fw-bold fs-6 text-primary">{{ __('messages.limit_reset_title') }}</h5>
                                    <p class="small text-secondary mb-3">{{ __('messages.limit_reset_text') }}</p>
                                    <a href="https://doxtreet.gumroad.com/l/limitreset?email={{ auth()->user()->email }}" class="btn btn-primary-modern btn-modern btn-sm">{{ __('messages.limit_reset_button', ['price' => '$1.50']) }}</a>
                                </div>
                            @endif
                        @endauth

                        <div class="mt-auto">
                            @auth
                                @if($currentPlan == 'base')
                                    <button class="btn btn-outline-modern btn-modern" disabled>{{ __('messages.your_current_plan') }}</button>
                                @endif
                            @else
                                <a href="{{ route('register', ['locale' => app()->getLocale()]) }}" class="btn btn-outline-modern btn-modern">{{ __('messages.start_free') }}</a>
                            @endguest
                        </div>
                    </div>
                </div>

                {{-- План "Стандарт" --}}
                <div class="col">
                    <div class="plan-card h-100 highlight @if($currentPlan == 'standard') current-plan @endif">
                        <div class="plan-badge">Popular</div>
                        <h3 class="plan-title">{{ __('messages.plan_standard_title') }}</h3>
                        <div class="mb-4">
                            <span class="plan-price"><span class="currency">$</span>9.99</span>
                            <span class="period">/ {{ __('messages.per_month') }}</span>
                        </div>
                        <ul class="plan-features">
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_standard_feature1', ['count' => config('subscriptions.plans.standard.daily_download_limit')]) !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_standard_feature2', ['count' => config('subscriptions.plans.standard.daily_signature_limit')]) !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_standard_feature3') !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_standard_feature4') !!}</li>
                        </ul>
                        <div class="mt-auto">
                            @auth
                                @if($currentPlan == 'standard')
                                    <button class="btn btn-outline-modern btn-modern" disabled>{{ __('messages.your_current_plan') }}</button>
                                @else
                                    <a href="https://doxtreet.gumroad.com/l/standardplan?email={{ auth()->user()->email }}" class="btn btn-primary-modern btn-modern">{{ __('messages.choose_plan') }}</a>
                                @endif
                            @else
                                <a href="https://doxtreet.gumroad.com/l/standardplan" class="btn btn-primary-modern btn-modern">{{ __('messages.choose_plan') }}</a>
                            @endguest
                        </div>
                    </div>
                </div>

                {{-- План "Про" --}}
                <div class="col">
                    <div class="plan-card h-100 @if($currentPlan == 'pro') current-plan @endif">
                        <h3 class="plan-title">{{ __('messages.plan_pro_title') }}</h3>
                        <div class="mb-4">
                            <span class="plan-price"><span class="currency">$</span>18.99</span>
                            <span class="period">/ {{ __('messages.per_month') }}</span>
                        </div>
                        <ul class="plan-features">
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_pro_feature1', ['count' => config('subscriptions.plans.pro.daily_download_limit')]) !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_pro_feature2', ['count' => config('subscriptions.plans.pro.daily_signature_limit')]) !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_pro_feature3') !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_pro_feature4', ['count' => config('subscriptions.plans.pro.custom_template_limit')]) !!}</li>
                            <li><i class="bi bi-check-circle-fill feature-icon-plus"></i>{!! __('messages.plan_pro_feature5') !!}</li>
                        </ul>
                        <div class="mt-auto">
                            @auth
                                @if($currentPlan == 'pro')
                                    <button class="btn btn-outline-modern btn-modern" disabled>{{ __('messages.your_current_plan') }}</button>
                                @else
                                    <a href="https://doxtreet.gumroad.com/l/proplan?email={{ auth()->user()->email }}" class="btn btn-primary-modern btn-modern">{{ __('messages.choose_plan') }}</a>
                                @endif
                            @else
                                <a href="https://doxtreet.gumroad.com/l/proplan" class="btn btn-primary-modern btn-modern">{{ __('messages.choose_plan') }}</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
