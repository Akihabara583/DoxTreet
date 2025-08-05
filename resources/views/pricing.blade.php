@extends('layouts.app')

@section('title', __('messages.pricing_title') . ' - ' . config('app.name'))
@section('description', __('messages.pricing_seo_description'))

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .pricing-card {
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
        }
        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
        .pricing-card.highlight {
            border: 2px solid var(--bs-primary);
            box-shadow: 0 0.5rem 1rem rgba(0, 123, 255, 0.25) !important;
        }
        .pricing-card .card-header {
            background-color: transparent;
        }
        .list-group-item i {
            color: var(--bs-primary);
        }
        .list-group-item.disabled i {
            color: #6c757d;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">{{ __('messages.pricing_title') }}</h1>
            <p class="fs-5 text-muted">{{ __('messages.pricing_subtitle') }}</p>
        </div>

        <div class="row row-cols-1 row-cols-lg-3 g-4 justify-content-center">

            {{-- План "База" --}}
            <div class="col">
                <div class="card h-100 pricing-card @if($currentPlan == 'base') highlight @endif">
                    <div class="card-header py-4">
                        <h4 class="fw-normal mb-0">{{ __('messages.plan_base_title') }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="mb-4">
                            <span class="display-4 fw-bold">$0</span>
                            <span class="text-muted">/ {{ __('messages.per_month') }}</span>
                        </div>
                        <ul class="list-group list-group-flush mb-4 text-start">
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_base_feature1', ['count' => config('subscriptions.plans.base.daily_download_limit')]) }}</li>
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_base_feature2', ['count' => config('subscriptions.plans.base.daily_signature_limit')]) }}</li>
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_standard_feature3') }}</li>
                        </ul>

                        {{-- ✅ УПРОЩЕННАЯ ЛОГИКА --}}
                        @auth
                            @if(empty(auth()->user()->subscription_plan) || auth()->user()->subscription_plan == 'base')
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ __('messages.limit_reset_title') }}</h5>
                                        <p class="card-text small">{{ __('messages.limit_reset_text') }}</p>
                                        <a href="https://doxtreet.gumroad.com/l/limitreset?email={{ auth()->user()->email }}" class="btn btn-light fw-bold w-100">{{ __('messages.limit_reset_button', ['price' => '$1.50']) }}</a>
                                    </div>
                                </div>
                            @endif
                        @endauth

                        <div class="mt-auto">
                            @auth
                                @if($currentPlan == 'base')
                                    <button class="btn btn-outline-secondary w-100 btn-lg" disabled>{{ __('messages.your_current_plan') }}</button>
                                @else
                                    {{-- Здесь может быть кнопка для даунгрейда в будущем --}}
                                @endif
                            @else
                                <a href="{{ route('register') }}" class="btn btn-outline-primary w-100 btn-lg">{{ __('messages.start_free') }}</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            {{-- План "Стандарт" --}}
            <div class="col">
                <div class="card h-100 pricing-card @if($currentPlan == 'standard') highlight @endif">
                    <div class="card-header py-4">
                        <h4 class="fw-normal mb-0">{{ __('messages.plan_standard_title') }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="mb-4">
                            <span class="display-4 fw-bold">$9.99</span>
                            <span class="text-muted">/ {{ __('messages.per_month') }}</span>
                        </div>
                        <ul class="list-group list-group-flush mb-4 text-start">
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_standard_feature1', ['count' => config('subscriptions.plans.standard.daily_download_limit')]) }}</li>
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_standard_feature2', ['count' => config('subscriptions.plans.standard.daily_signature_limit')]) }}</li>
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_standard_feature3') }}</li>
                        </ul>
                        <div class="mt-auto">
                            @auth
                                @if($currentPlan == 'standard')
                                    <button class="btn btn-outline-secondary w-100 btn-lg" disabled>{{ __('messages.your_current_plan') }}</button>
                                @else
                                    <a href="https://doxtreet.gumroad.com/l/standardplan?email={{ auth()->user()->email }}" class="btn btn-primary w-100 btn-lg">{{ __('messages.choose_plan') }}</a>
                                @endif
                            @else
                                <a href="https://doxtreet.gumroad.com/l/standardplan" class="btn btn-primary w-100 btn-lg">{{ __('messages.choose_plan') }}</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            {{-- План "Про" --}}
            <div class="col">
                <div class="card h-100 pricing-card @if($currentPlan == 'pro') highlight @endif">
                    <div class="card-header py-4">
                        <h4 class="fw-normal mb-0">{{ __('messages.plan_pro_title') }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="mb-4">
                            <span class="display-4 fw-bold">$18.99</span>
                            <span class="text-muted">/ {{ __('messages.per_month') }}</span>
                        </div>
                        <ul class="list-group list-group-flush mb-4 text-start">
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_pro_feature1', ['count' => config('subscriptions.plans.pro.daily_download_limit')]) }}</li>
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_pro_feature2', ['count' => config('subscriptions.plans.pro.daily_signature_limit')]) }}</li>
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_pro_feature3', ['count' => config('subscriptions.plans.pro.custom_template_limit')]) }}</li>
                            <li class="list-group-item border-0"><i class="bi bi-check-circle-fill me-2"></i>{{ __('messages.plan_standard_feature3') }}</li>
                        </ul>
                        <div class="mt-auto">
                            @auth
                                @if($currentPlan == 'pro')
                                    <button class="btn btn-outline-secondary w-100 btn-lg" disabled>{{ __('messages.your_current_plan') }}</button>
                                @else
                                    <a href="https://doxtreet.gumroad.com/l/proplan?email={{ auth()->user()->email }}" class="btn btn-primary w-100 btn-lg">{{ __('messages.choose_plan') }}</a>
                                @endif
                            @else
                                <a href="https://doxtreet.gumroad.com/l/proplan" class="btn btn-primary w-100 btn-lg">{{ __('messages.choose_plan') }}</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
