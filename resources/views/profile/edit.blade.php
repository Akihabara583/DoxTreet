@extends('layouts.app')

@section('title', __('messages.edit_profile') . ' - ' . config('app.name'))

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
        .modern-form-label {
            font-weight: 600;
            color: var(--text-secondary, #4c495d);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .modern-form-control {
            display: block;
            width: 100%;
            background-color: var(--bg-secondary, #faf7ff) !important;
            border: 1px solid var(--border, #e5e1f5) !important;
            border-radius: 12px !important;
            padding: 0.75rem 1rem !important;
            color: var(--text-primary, #1e1b31) !important;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .modern-form-control:focus {
            outline: none !important;
            border-color: var(--primary, #8b5cf6) !important;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2) !important;
            background-color: var(--bg-primary, #fff) !important;
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
                {{-- Sidebar --}}
                <div class="col-md-3">
                    <div class="list-group profile-sidebar">
                        <a href="{{ route('profile.show', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                            <i class="bi bi-person-circle"></i> {{ __('messages.overview') }}
                        </a>
                        <a href="{{ route('profile.edit', app()->getLocale()) }}" class="list-group-item list-group-item-action active" aria-current="true">
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
                    <div class="profile-content mb-4">
                        <h2 class="h3 mb-2" style="color: var(--text-primary);">{{ __('messages.profile_information') }}</h2>
                        <p class="text-muted">{{ __('messages.profile_information_text') }}</p>

                        <form method="post" action="{{ route('profile.update', app()->getLocale()) }}">
                            @csrf
                            @method('patch')

                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success" role="alert">{{ __('messages.profile_updated_successfully') }}</div>
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label modern-form-label">{{ __('messages.name') }}</label>
                                <input id="name" name="name" type="text" class="form-control modern-form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label modern-form-label">Email</label>
                                <input id="email" name="email" type="email" class="form-control modern-form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <hr class="my-4" style="border-color: var(--border);">

                            <h4 class="h5" style="color: var(--text-primary);">{{ __('messages.update_password') }}</h4>
                            <p class="text-muted small">{{ __('messages.update_password_text') }}</p>

                            <div class="mb-3">
                                <label for="password" class="form-label modern-form-label">{{ __('messages.new_password') }}</label>
                                <input id="password" name="password" type="password" class="form-control modern-form-control @error('password') is-invalid @enderror">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label modern-form-label">{{ __('messages.confirm_password') }}</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control modern-form-control">
                            </div>

                            <button type="submit" class="btn btn-primary-modern btn-modern">{{ __('messages.save') }}</button>
                        </form>
                    </div>

                    <div class="profile-content">
                        <h4 class="h5 text-danger">{{ __('messages.delete_account') }}</h4>
                        <p class="text-muted">{{ __('messages.delete_account_text') }}</p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                            {{ __('messages.delete_account_button') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Deletion Modal --}}
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 20px;">
                <form method="post" action="{{ route('profile.destroy', app()->getLocale()) }}">
                    @csrf
                    @method('delete')
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('messages.confirm_account_deletion') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger"><strong>{{ __('messages.warning_permanent_deletion') }}</strong></p>
                        <p>{{ __('messages.confirm_account_deletion_text') }}</p>
                        <div class="mb-3">
                            <label for="password-for-deletion" class="form-label modern-form-label">{{ __('messages.password_to_confirm') }}</label>
                            <input id="password-for-deletion" name="password" type="password" class="form-control modern-form-control @error('password', 'userDeletion') is-invalid @enderror" required>
                            @error('password', 'userDeletion')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('messages.delete_account_button') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
