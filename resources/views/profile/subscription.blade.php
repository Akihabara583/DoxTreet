@extends('layouts.app')

@section('title', __('messages.my_subscription') . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Боковое меню --}}
            <div class="col-md-3">
                @include('profile.partials._sidebar')
            </div>

            {{-- Основной контент --}}
            <div class="col-md-9">
                <h2 class="mb-4">{{ __('messages.my_subscription') }}</h2>

                {{-- ✅ ИСПРАВЛЕННАЯ ЛОГИКА: Блок теперь виден всегда для базового тарифа --}}
                @if(empty($user->subscription_plan) || $user->subscription_plan == 'base')
                    <div class="card text-white bg-primary mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('messages.limit_reset_title') }}</h5>
                            <p class="card-text">{{ __('messages.limit_reset_text') }}</p>
                            <a href="https://doxtreet.gumroad.com/l/limitreset?email={{ $user->email }}" class="btn btn-light fw-bold">{{ __('messages.limit_reset_button', ['price' => '$3']) }}</a>
                        </div>
                    </div>
                @endif

                {{-- Карточка с деталями плана --}}
                <div class="card">
                    <div class="card-header fs-5 fw-bold">
                        {{ __('messages.current_plan_details') }}
                    </div>
                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                        @endif

                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="card-title">
                                    {{ __('messages.plan_' . ($user->subscription_plan ?? 'base') . '_title') }}
                                </h2>
                                @if($user->subscription_expires_at)
                                    <p class="text-muted">
                                        {{ __('messages.subscription_valid_until') }}: {{ $user->subscription_expires_at->format('d.m.Y') }}
                                    </p>
                                @else
                                    <p class="text-muted">{{ __('messages.indefinite_subscription') }}</p>
                                @endif
                            </div>
                            <div class="col-md-4 text-md-end">
                                <a href="{{ route('pricing', app()->getLocale()) }}" class="btn btn-primary">
                                    <i class="bi bi-gem me-2"></i>{{ __('messages.change_plan') }}
                                </a>
                            </div>
                        </div>

                        @if($user->gumroad_subscriber_id)
                            <hr>
                            <div class="mt-3">
                                <p class="text-muted small">{{ __('messages.auto_renewal_info') }}</p>
                                <form action="{{ route('profile.subscription.cancel', app()->getLocale()) }}" method="POST" onsubmit="return confirm('{{ __('messages.confirm_cancel_sub') }}');">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">{{ __('messages.cancel_auto_renewal_button') }}</button>
                                </form>
                            </div>
                        @elseif(!$user->gumroad_subscriber_id && in_array($user->subscription_plan, ['standard', 'pro']) && $user->subscription_expires_at && !$user->subscription_expires_at->isPast())
                            <hr>
                            <div class="mt-3">
                                <p class="text-success fw-bold">
                                    <i class="bi bi-check-circle-fill"></i>
                                    {!! __('messages.auto_renewal_cancelled_info', ['date' => $user->subscription_expires_at->format('d.m.Y')]) !!}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Карточка с лимитами --}}
                <div class="card mt-4">
                    <div class="card-header fs-5 fw-bold">
                        {{ __('messages.daily_limits_usage_title') }}
                    </div>
                    <div class="card-body">
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
