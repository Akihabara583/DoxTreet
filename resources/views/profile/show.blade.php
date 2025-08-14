@extends('layouts.app')

@section('title', __('messages.my_account') . ' - ' . config('app.name'))

@push('styles')
    <style>
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
    </style>
@endpush

@section('content')
    <div class="profile-layout">
        <div class="container">
            <div class="row">
                {{-- Sidebar --}}
                <div class="col-md-3">
                    <div class="list-group profile-sidebar">
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
                        <a href="{{ route('profile.subscription', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
                        </a>
                        <a href="{{ route('profile.signed-documents.history', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-pen"></i> {{ __('messages.signed_documents') }}
                        </a>
                        <a href="{{ route('profile.my-templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-collection"></i> {{ __('messages.my_templates') }}
                        </a>
                        <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-plus-circle"></i> {{ __('messages.create_template') }}
                        </a>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="col-md-9">
                    <div class="profile-content">
                        <h2 class="h3 mb-4" style="color: var(--text-primary);">{{ __('messages.my_account') }}</h2>
                        <h5 class="card-title fw-normal" style="color: var(--text-secondary);">{{ __('messages.welcome_back') }}, {{ Auth::user()->name }}!</h5>
                        <p class="card-text text-muted">{{ __('messages.profile_dashboard_text') }}</p>

                        <div class="row mt-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="stat-card text-center">
                                    <h3 class="display-6">{{ Auth::user()->generatedDocuments()->count() }}</h3>
                                    <p class="mb-0 text-muted">{{ __('messages.documents_created') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stat-card text-center">
                                    @php
                                        $plan = Auth::user()->subscription_plan ?? 'base';
                                        $planKey = 'messages.plan_' . $plan . '_title';
                                    @endphp
                                    <h3 class="display-6 text-capitalize">{{ __($planKey) }}</h3>
                                    <p class="mb-0 text-muted">{{ __('messages.current_plan') }}</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('profile.history', app()->getLocale()) }}" class="btn btn-primary-modern btn-modern mt-4">{{ __('messages.view_my_documents') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
