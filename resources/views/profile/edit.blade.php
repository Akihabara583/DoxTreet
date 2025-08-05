@extends('layouts.app')

@section('title', __('messages.edit_profile') . ' - ' . config('app.name'))

@section('content')
    <div class="container py-5">
        <div class="row">
            {{-- Боковое меню --}}
            <div class="col-md-3">
                <div class="list-group">
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
                    {{-- ✅ ИСПРАВЛЕННЫЙ МАРШРУТ --}}
                    <a href="{{ route('profile.subscription', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
                    </a>
                    <a href="{{ route('profile.signed-documents.history', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.signed-documents.history') ? 'active' : '' }}">
                        <i class="bi bi-pen"></i> {{ __('messages.signed_documents') }}
                    </a>
                    <a href="{{ route('profile.my-templates.index', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.*') && !request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                        <i class="bi bi-collection me-2"></i> {{ __('messages.my_templates') }}
                    </a>
                    <a href="{{ route('profile.my-templates.create', app()->getLocale()) }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.my-templates.create') ? 'active' : '' }}">
                        <i class="bi bi-plus-circle me-2"></i> {{ __('messages.create_template') }}
                    </a>
                </div>
            </div>

            {{-- Форма редактирования --}}
            <div class="col-md-9">
                <h2>{{ __('messages.profile_information') }}</h2>
                <p class="text-muted">{{ __('messages.profile_information_text') }}</p>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update', app()->getLocale()) }}">
                            @csrf
                            @method('patch')

                            {{-- Сообщение об успехе --}}
                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success" role="alert">
                                    {{ __('messages.profile_updated_successfully') }}
                                </div>
                            @endif

                            {{-- Имя --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('messages.name') }}</label>
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="email">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <hr>
                            <h4>{{ __('messages.update_password') }}</h4>
                            <p class="text-muted small">{{ __('messages.update_password_text') }}</p>

                            {{-- Текущий пароль (можно убрать, если не требуется) --}}

                            {{-- Новый пароль --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('messages.new_password') }}</label>
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            {{-- Подтверждение пароля --}}
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('messages.confirm_password') }}</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        </form>
                    </div>
                </div>
                {{-- ✅ НАЧАЛО: НОВЫЙ БЛОК ДЛЯ УДАЛЕНИЯ АККАУНТА --}}
                <div class="card mt-4">
                    <div class="card-header bg-danger text-white">
                        {{ __('messages.delete_account') }}
                    </div>
                    <div class="card-body">
                        <p class="text-muted">{{ __('messages.delete_account_text') }}</p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                            {{ __('messages.delete_account_button') }}
                        </button>
                    </div>
                </div>
                {{-- ✅ КОНЕЦ: НОВЫЙ БЛОК ДЛЯ УДАЛЕНИЯ АККАУНТА --}}

            </div>
        </div>
    </div>


    {{-- ✅ НАЧАЛО: МОДАЛЬНОЕ ОКНО ПОДТВЕРЖДЕНИЯ --}}
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy', app()->getLocale()) }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('messages.confirm_account_deletion') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger"><strong>{{ __('messages.warning_permanent_deletion') }}</strong></p>
                        <p>{{ __('messages.confirm_account_deletion_text') }}</p>

                        <div class="mb-3">
                            <label for="password-for-deletion" class="form-label">{{ __('messages.password_to_confirm') }}</label>
                            <input id="password-for-deletion" name="password" type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" required>
                            @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
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
            </div>
        </div>
    </div>
@endsection
