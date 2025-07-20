@extends('layouts.app')

@section('title', __('messages.my_account') . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">{{ __('messages.my_account') }}</h1>

        <div class="row">
            {{-- Боковое меню --}}
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('profile.show', app()->getLocale()) }}" class="list-group-item list-group-item-action active" aria-current="true">
                        <i class="bi bi-person-circle"></i> {{ __('messages.overview') }}
                    </a>
                    <a href="{{ route('profile.edit', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-pencil-square"></i> {{ __('messages.edit_profile') }}
                    </a>
                    <a href="{{ route('profile.history', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-clock-history"></i> {{ __('messages.document_history') }}
                    </a>
                    <a href="{{ route('profile.my-data', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-safe"></i> {{ __('messages.my_data') }}
                    </a>
                    <a href="{{ route('pricing', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
                    </a>
                    {{-- ИЗМЕНЕНИЕ ЗДЕСЬ: Добавлен префикс 'profile.' к имени роута --}}
                    <a href="{{ route('profile.my-templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.*') && !request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                        <i class="bi bi-collection me-2"></i> {{ __('messages.my_templates') }}
                    </a>
                    <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                        <i class="bi bi-plus-circle me-2"></i> {{ __('messages.create_template') }}
                    </a>
                </div>

            </div>

            {{-- Основной контент --}}
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('messages.welcome_back') }}, {{ Auth::user()->name }}!</h5>
                        <p class="card-text text-muted">{{ __('messages.profile_dashboard_text') }}</p>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card bg-light border-0">
                                    <div class="card-body text-center">
                                        <h3 class="display-6">{{ Auth::user()->generatedDocuments()->count() }}</h3>
                                        <p class="mb-0">{{ __('messages.documents_created') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light border-0">
                                    <div class="card-body text-center">
                                        {{-- ИСПРАВЛЕНО: Блок стал динамическим --}}
                                        @if(Auth::user()->subscription_plan == 'pro')
                                            <h3 class="display-6 text-primary">{{ __('messages.pro_plan') }}</h3>
                                        @else
                                            <h3 class="display-6">{{ __('messages.free_plan') }}</h3>
                                        @endif
                                        <p class="mb-0">{{ __('messages.current_plan') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('profile.history', app()->getLocale()) }}" class="btn btn-primary mt-4">{{ __('messages.view_my_documents') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
