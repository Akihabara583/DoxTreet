<x-guest-layout>
    <div class="absolute top-4 right-4 z-50">
        <x-language-switcher />
    </div>
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('messages.verify_code_intro') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <x-input-error :messages="$errors->get('code')" class="mt-2" />

        <form method="POST" action="{{ route('verification.code.verify', ['locale' => app()->getLocale()]) }}">
            @csrf

            <div>
                <x-input-label for="code" :value="__('messages.verification_code')" />
                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" required autofocus autocomplete="one-time-code" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('messages.verify_email_button') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
