@extends('layouts.app')

@section('title', __('messages.pricing') . ' - ' . config('app.name'))
@section('description', 'Выберите подходящий тарифный план для генерации документов. Доступны бесплатный и профессиональный планы.')

@section('content')
    <div class="container py-3">
        <header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal">{{ __('messages.pricing_title') }}</h1>
                <p class="fs-5 text-muted">{{ __('messages.pricing_subtitle') }}</p>
            </div>
        </header>

        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center justify-content-center">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">{{ __('messages.free_plan') }}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">{{ __('messages.per_month') }}</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>{{ __('messages.feature_daily_limit') }}</li>
                                <li>{{ __('messages.feature_all_templates') }}</li>
                                <li>{{ __('messages.feature_email_support') }}</li>
                                <li>-</li>
                            </ul>
                            <a href="{{ route('register', app()->getLocale()) }}" class="w-100 btn btn-lg btn-outline-primary">{{ __('messages.start_free') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">{{ __('messages.pro_plan') }}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$8<small class="text-muted fw-light">{{ __('messages.per_month') }}</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>{!! __('messages.feature_unlimited') !!}</li>
                                <li>{{ __('messages.feature_all_templates') }}</li>
                                <li>{!! __('messages.feature_history') !!}</li>
                                <li>{{ __('messages.feature_priority_support') }}</li>
                            </ul>
                            {{-- Ссылка на регистрацию, позже заменится на страницу оплаты --}}
                            <a href="{{ route('register', app()->getLocale()) }}" class="w-100 btn btn-lg btn-primary">{{ __('messages.choose_pro') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
