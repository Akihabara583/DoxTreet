@extends('layouts.app')

@section('title', __('messages.admin_panel') . ' - ' . config('app.name'))

@push('styles')
    <style>
        .icon-lg {
            font-size: 2.5rem;
            opacity: 0.3;
        }
        .card-body .card-title {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('admin.partials._sidebar')
            </div>
            <div class="col-md-9">
                {{-- Проверяем, если пользователь НЕ является "админом для сотрудников" --}}
                @if (!Auth::user()->isEmployeeAdmin())
                    <h1><i class="bi bi-speedometer2"></i> {{ __('messages.dashboard') }}</h1>
                    <p>{{ __('messages.admin_welcome') }}</p>

                    {{-- ✅ НОВЫЙ БЛОК СТАТИСТИКИ АКТИВНОСТИ --}}
                    <div class="row mb-4">
                        <div class="col-12">
                            <h4>Статистика Активности</h4>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3">
                            <div class="card bg-info text-white h-100">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="card-title">{{ $onlineUsers ?? 0 }}</div>
                                        <p class="card-text small">Пользователей онлайн</p>
                                    </div>
                                    <i class="bi bi-person-check-fill icon-lg"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="card-title">{{ $visitsToday ?? 0 }}</div>
                                        <p class="card-text small">Посещений сегодня</p>
                                        <small>(Уникальных: {{ $uniqueVisitorsToday ?? 0 }})</small>
                                    </div>
                                    <i class="bi bi-calendar-day icon-lg"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3">
                            <div class="card bg-warning text-dark h-100">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="card-title">{{ $visitsWeek ?? 0 }}</div>
                                        <p class="card-text small">Посещений за неделю</p>
                                    </div>
                                    <i class="bi bi-calendar-week icon-lg"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-3">
                            <div class="card bg-secondary text-white h-100">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="card-title">{{ $visitsMonth ?? 0 }}</div>
                                        <p class="card-text small">Посещений за месяц</p>
                                    </div>
                                    <i class="bi bi-calendar-month icon-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- ✅ НОВЫЙ БЛОК СТАТИСТИКИ КОНТЕНТА И ПОДПИСОК --}}
                    <div class="row">
                        <div class="col-12">
                            <h4>Статистика Контента и Подписок</h4>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-3">
                            <div class="card border-success">
                                <div class="card-header">Подписки "Pro"</div>
                                <div class="card-body text-success d-flex justify-content-between align-items-center">
                                    <div class="card-title">{{ $subscriptionStats['pro'] ?? 0 }}</div>
                                    <i class="bi bi-trophy-fill icon-lg"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-3">
                            <div class="card border-primary">
                                <div class="card-header">Подписки "Standard"</div>
                                <div class="card-body text-primary d-flex justify-content-between align-items-center">
                                    <div class="card-title">{{ $subscriptionStats['standard'] ?? 0 }}</div>
                                    <i class="bi bi-award-fill icon-lg"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-3">
                            <div class="card border-info">
                                <div class="card-header">Пользователей на "Base"</div>
                                <div class="card-body text-info d-flex justify-content-between align-items-center">
                                    <div class="card-title">{{ $subscriptionStats['base'] ?? ($subscriptionStats[null] ?? 0) }}</div>
                                    <i class="bi bi-person-fill icon-lg"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light mb-3">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-dark">{{ $totalTemplates }}</h5>
                                        <p class="card-text">{{ __('messages.total_templates') }}</p>
                                    </div>
                                    <i class="bi bi-file-earmark-text icon-lg text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light mb-3">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-dark">{{ $totalCategories }}</h5>
                                        <p class="card-text">{{ __('messages.total_categories') }}</p>
                                    </div>
                                    <i class="bi bi-folder-fill icon-lg text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Здесь можно показать что-то другое для "админа для сотрудников"
                         Например, приветствие или просто пустой блок, если вы перенаправляете их контроллером --}}
                    <h1>{{ __('messages.admin_panel') }}</h1>
                    <p>Добро пожаловать в панель управления. Используйте боковое меню для навигации.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
