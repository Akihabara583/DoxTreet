@extends('layouts.app')

@section('title', __('messages.my_subscription') . ' - ' . config('app.name'))

@push('styles')
    <style>
        .profile-layout {
            background-color: #faf7ff;
            padding: 4rem 0;
        }
        .profile-sidebar .list-group-item {
            border-radius: 12px;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4c495d;
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }
        .profile-sidebar .list-group-item i {
            margin-right: 1rem;
            width: 20px;
        }
        .profile-sidebar .list-group-item:hover {
            background-color: #fff;
            color: #8b5cf6;
            transform: translateX(5px);
        }
        .profile-sidebar .list-group-item.active {
            background-color: #8b5cf6;
            color: white;
            border-color: #8b5cf6;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }
        .profile-content {
            background-color: #fff;
            border-radius: 24px;
            padding: 2.5rem;
            border: 1px solid #e5e1f5;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
        }
        /* Стили для полосок лимитов */
        .progress {
            height: 10px; /* Стандартная высота Bootstrap */
            background-color: #f3f0ff; /* Светлый фон для "дорожки" */
        }
        .progress-bar {
            /* Тот самый сине-фиолетовый градиент */
            background: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
        }
        .btn-modern {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-primary-modern {
            background: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%);
            color: white;
        }
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            color: white;
        }
        .profile-layout {
            background-color: var(--bg-secondary, #faf7ff);
            padding: 4rem 0;
        }
        .profile-sidebar .list-group-item {
            border-radius: 12px;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-secondary, #4c495d);
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }
        .profile-sidebar .list-group-item i {
            margin-right: 1rem;
            width: 20px;
        }
        .profile-sidebar .list-group-item:hover {
            background-color: var(--bg-primary, #fff);
            color: var(--primary, #8b5cf6);
            transform: translateX(5px);
        }
        .profile-sidebar .list-group-item.active {
            background-color: var(--primary, #8b5cf6);
            color: white;
            border-color: var(--primary, #8b5cf6);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
        }
        .profile-content {
            background-color: var(--bg-primary, #fff);
            border-radius: 24px;
            padding: 2.5rem;
            border: 1px solid var(--border, #e5e1f5);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
        }
        .stat-card {
            background-color: var(--bg-secondary, #faf7ff);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid var(--border, #e5e1f5);
        }
        .stat-card .display-6 {
            font-weight: 700;
            color: var(--primary, #8b5cf6);
        }
        .btn-modern {
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-primary-modern {
            background: var(--gradient-brand, linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%));
            color: white;
        }
        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            color: white;
        }

        /* ✅ ИСПРАВЛЕННЫЙ CSS ТОЛЬКО ДЛЯ ВЫПАДАЮЩЕГО СПИСКА */
        .navbar .dropdown-menu {
            border-radius: 16px !important;
            border: 1px solid var(--border, #e5e1f5) !important;
            box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
            padding: 0.5rem !important;
            margin-top: 0.75rem !important;
            background-color: var(--bg-primary, #ffffff) !important;
        }
        .navbar .dropdown-item {
            border-radius: 12px;
            font-weight: 500;
            padding: 0.5rem 1rem;
        }
        .navbar .dropdown-item:hover, .navbar .dropdown-item:focus {
            background-color: var(--bg-secondary, #faf7ff);
            color: var(--primary, #8b5cf6);
        }
        .navbar .dropdown-item i {
            margin-right: 0.75rem;
        }
        /* ✅ КОНЕЦ ИСПРАВЛЕННОГО CSS */
    </style>
@endpush

@section('content')
    <div class="profile-layout">
        <div class="container">
            <div class="row">
                {{-- Боковое меню --}}
                <div class="col-md-3">
                    @include('profile.partials._sidebar', ['active' => 'subscription'])
                </div>

                {{-- Основной контент --}}
                <div class="col-md-9">
                    {{-- Блок для сброса лимитов --}}
                    @if(empty($user->subscription_plan) || $user->subscription_plan == 'base')
                        <div class="profile-content mb-4 text-center">
                            <h4 class="h5 fw-bold" style="color: var(--primary);">{{ __('messages.limit_reset_title') }}</h4>
                            <p class="text-muted">{{ __('messages.limit_reset_text') }}</p>
                            <a href="https://doxtreet.gumroad.com/l/limitreset?email={{ $user->email }}" class="btn btn-primary-modern btn-modern">{{ __('messages.limit_reset_button', ['price' => '$1.50']) }}</a>
                        </div>
                    @endif

                    {{-- Карточка с деталями плана --}}
                    <div class="profile-content mb-4">
                        <h3 class="h4 mb-4" style="color: var(--text-primary);">{{ __('messages.current_plan_details') }}</h3>
                        {{-- ... остальная часть этого блока без изменений ... --}}
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="h2 text-capitalize" style="color: var(--primary);">{{ __('messages.plan_' . ($user->subscription_plan ?? 'base') . '_title') }}</h4>
                                @if($user->subscription_expires_at)
                                    <p class="text-muted">{{ __('messages.subscription_valid_until') }}: {{ $user->subscription_expires_at->format('d.m.Y') }}</p>
                                @else
                                    <p class="text-muted">{{ __('messages.indefinite_subscription') }}</p>
                                @endif
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <a href="{{ route('pricing', app()->getLocale()) }}" class="btn btn-primary-modern btn-modern">{{ __('messages.change_plan') }}</a>
                            </div>
                        </div>
                        @if($user->gumroad_subscriber_id)
                            <hr class="my-4">
                            <div>
                                <p class="small text-muted mb-2">{{ __('messages.auto_renewal_info') }}</p>
                                <form action="{{ route('profile.subscription.cancel', app()->getLocale()) }}" method="POST" onsubmit="return confirm('{{ __('messages.confirm_cancel_sub') }}');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('messages.cancel_auto_renewal_button') }}</button>
                                </form>
                            </div>
                        @elseif(!$user->gumroad_subscriber_id && in_array($user->subscription_plan, ['standard', 'pro']) && $user->subscription_expires_at && !$user->subscription_expires_at->isPast())
                            <hr class="my-4">
                            <div>
                                <p class="text-success fw-bold small"><i class="bi bi-check-circle-fill"></i> {!! __('messages.auto_renewal_cancelled_info', ['date' => $user->subscription_expires_at->format('d.m.Y')]) !!}</p>
                            </div>
                        @endif
                    </div>

                    {{-- Карточка с лимитами --}}
                    <div class="profile-content">
                        <h3 class="h4 mb-4" style="color: var(--text-primary);">{{ __('messages.daily_limits_usage_title') }}</h3>

                        {{-- Downloads Limit --}}
                        <div class="mb-3">
                            @php
                                $downloads_used = $user->daily_download_limit - $user->downloads_left;
                            @endphp
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-medium">{{ __('messages.limit_downloads_used') }}</span>
                                <span class="text-muted">{{ $downloads_used }} / {{ $user->daily_download_limit }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $user->daily_download_limit > 0 ? ($downloads_used / $user->daily_download_limit) * 100 : 0 }}%;" aria-valuenow="{{ $downloads_used }}" aria-valuemin="0" aria-valuemax="{{ $user->daily_download_limit }}"></div>
                            </div>
                        </div>

                        {{-- Signatures Limit --}}
                        <div class="mb-3">
                            @php
                                $signatures_used = $user->daily_signature_limit - $user->signatures_left;
                            @endphp
                            <div class="d-flex justify-content-between mb-1">
                                <span class="fw-medium">{{ __('messages.limit_signatures_used') }}</span>
                                <span class="text-muted">{{ $signatures_used }} / {{ $user->daily_signature_limit }}</span>
                            </div>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $user->daily_signature_limit > 0 ? ($signatures_used / $user->daily_signature_limit) * 100 : 0}}%;" aria-valuenow="{{ $signatures_used }}" aria-valuemin="0" aria-valuemax="{{ $user->daily_signature_limit }}"></div>
                            </div>
                        </div>

                        {{-- Custom Templates Limit --}}
                        @if($user->custom_template_limit > 0)
                            <div class="mb-3">
                                @php
                                    $custom_templates_used = $user->custom_template_limit - $user->custom_templates_left;
                                @endphp
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-medium">{{ __('messages.limit_custom_templates_used') }}</span>
                                    <span class="text-muted">{{ $custom_templates_used }} / {{ $user->custom_template_limit }}</span>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $user->custom_template_limit > 0 ? ($custom_templates_used / $user->custom_template_limit) * 100 : 0}}%;" aria-valuenow="{{ $custom_templates_used }}" aria-valuemin="0" aria-valuemax="{{ $user->custom_template_limit }}"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
