<x-guest-layout>
    <!-- Language Switcher -->
    <div class="d-flex justify-content-end mb-4">
        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-translate"></i>
                @if(app()->getLocale() == 'uk')
                    UA
                @else
                    {{ strtoupper(app()->getLocale()) }}
                @endif
            </button>
            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                @foreach(config('app.available_locales') as $locale_code)
                    <li>
                        <a class="dropdown-item" href="{{ route('language.switch', ['language' => $locale_code]) }}">
                            @if($locale_code == 'uk')
                                UA
                            @else
                                {{ strtoupper($locale_code) }}
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <h2 class="text-center mb-4" style="font-weight: 700; color: var(--text-primary);">{{ __('messages.create_account') }}</h2>

    <form method="POST" action="{{ route('register', ['locale' => app()->getLocale()]) }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <x-input-label for="name" :value="__('messages.user_name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 mb-3">
            <x-input-label for="email" :value="__('messages.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 mb-3">
            <x-input-label for="password" :value="__('messages.password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 mb-4">
            <x-input-label for="password_confirmation" :value="__('messages.confirm_password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="d-grid mb-4">
            <x-primary-button>{{ __('messages.register_button') }}</x-primary-button>
        </div>

        <!-- Social Login -->
        <div class="text-center">
            <div class="d-flex align-items-center my-4">
                <hr class="flex-grow-1" style="border-color: var(--border);">
                <span class="mx-2 text-muted small">{{ __('messages.or_continue_with') }}</span>
                <hr class="flex-grow-1" style="border-color: var(--border);">
            </div>
            <a href="{{ route('social.redirect', ['provider' => 'google', 'locale' => app()->getLocale()]) }}" class="btn btn-outline-secondary w-100">
                <img class="me-2" src="https://www.vectorlogo.zone/logos/google/google-icon.svg" alt="Google icon" style="width: 20px; height: 20px; vertical-align: middle;">
                Google
            </a>
        </div>

        <p class="text-center mt-4 small">
            {{ __('messages.already_have_account') }}
            <a href="{{ route('login', ['locale' => app()->getLocale()]) }}">{{ __('messages.log_in_link') }}</a>
        </p>
    </form>
</x-guest-layout>
