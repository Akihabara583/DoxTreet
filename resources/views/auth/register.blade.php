<x-guest-layout>
    <!-- Установка заголовка для вкладки браузера -->
    <x-slot name="title">
        DoxTreet - {{ __('messages.create_account') }}
    </x-slot>

    <div class="w-full sm:max-w-5xl mx-auto">
        <div class="flex flex-col md:flex-row bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">

            <!-- Левая колонка: Форма -->
            <div class="w-full md:w-1/2 p-8 sm:p-12">
                <div class="w-full">
                    <div class="text-center mb-8">
                        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                            <x-application-logo class="w-20 h-20 mx-auto" />
                        </a>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ __('messages.create_account') }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-8">{{ __('messages.start_journey') }}</p>

                    <form method="POST" action="{{ route('register', ['locale' => app()->getLocale()]) }}">
                        @csrf

                        <div class="mb-5">
                            <x-input-label for="name" :value="__('messages.user_name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mb-5">
                            <x-input-label for="email" :value="__('messages.email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mb-5">
                            <x-input-label for="password" :value="__('messages.password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="password_confirmation" :value="__('messages.confirm_password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        <div class="mb-6">
                            <x-primary-button class="w-full justify-center text-base py-3">{{ __('messages.register_button') }}</x-primary-button>
                        </div>

                        <!-- ИЗМЕНЕНИЕ: Убрана кнопка Facebook -->
                        <div>
                            <div class="relative my-6">
                                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-300 dark:border-gray-600"></div></div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">{{ __('messages.or_continue_with') }}</span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('social.redirect', ['provider' => 'google', 'locale' => app()->getLocale()]) }}" class="w-full flex items-center justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-300">
                                    <img class="w-5 h-5 mr-2" src="https://www.vectorlogo.zone/logos/google/google-icon.svg" alt="Google icon"> Google
                                </a>
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 dark:text-gray-300 text-center mt-8">{{ __('messages.already_have_account') }} <a href="{{ route('login', ['locale' => app()->getLocale()]) }}" class="font-medium text-blue-600 hover:underline">{{ __('messages.log_in_link') }}</a></p>
                    </form>
                </div>
            </div>

            <!-- Правая колонка: Иллюстрация -->
            <div class="hidden md:flex w-1/2 bg-blue-600 items-center justify-center p-12 flex-col text-white relative">
                <div class="absolute top-4 right-4 z-50">
                    <x-language-switcher />
                </div>
                <div class="max-w-sm text-center">
                    <h2 class="text-3xl font-bold mt-6">{{ __('messages.book_register_title') }}</h2>
                    <p class="mt-4 text-blue-200">{{ __('messages.book_register_text') }}</p>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
