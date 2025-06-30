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
                    <a href="{{ route('pricing', app()->getLocale()) }}" class="list-group-item list-group-item-action">
                        <i class="bi bi-gem"></i> {{ __('messages.my_subscription') }}
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
            </div>
        </div>
    </div>
@endsection
