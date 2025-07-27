<footer class="bg-dark text-white mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>{{ config('app.name', 'DoxTreet') }}</h5>
                <p class="text-white-50">{{ __('messages.seo_default_description') }}</p>
            </div>
            <div class="col-md-2 mb-3">
                <h5>{{ __('messages.categories') }}</h5>
                <ul class="list-unstyled">
                    {{-- Выводим до 5 категорий в футере --}}
                    @foreach(\App\Models\Category::query()->take(5)->get() as $category)
                        {{-- ✅ ИЗМЕНЕНИЕ: Добавлен резервный вариант на случай отсутствия перевода --}}
                        <li><a href="{{ route('home', app()->getLocale()) }}#category-{{ $category->id }}" class="text-white-50 text-decoration-none">{{ $category->getTranslation('name', app()->getLocale()) ?? $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 mb-3">
                <h5>{{ __('messages.navigation') }}</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home', app()->getLocale()) }}" class="text-white-50 text-decoration-none">{{ __('messages.home') }}</a></li>
                    <li><a href="{{ route('faq', app()->getLocale()) }}" class="text-white-50 text-decoration-none">{{ __('messages.faq') }}</a></li>
                    <li><a href="{{ route('about', app()->getLocale()) }}" class="text-white-50 text-decoration-none">{{ __('messages.about_us') }}</a></li>
                    @guest
                        <li><a href="{{ route('login', app()->getLocale()) }}" class="text-white-50 text-decoration-none">{{ __('messages.login') }}</a></li>
                        <li><a href="{{ route('register', app()->getLocale()) }}" class="text-white-50 text-decoration-none">{{ __('messages.register') }}</a></li>
                    @endguest
                    @auth
                        <li><a href="{{ route('profile.show', app()->getLocale()) }}" class="text-white-50 text-decoration-none">{{ __('messages.my_profile') }}</a></li>
                    @endauth
                </ul>
            </div>
            <div class="col-md-3 mb-3">
                <h5>{{ __('messages.legal') }}</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('terms', app()->getLocale()) }}" class="text-white-50 text-decoration-none">{{ __('messages.terms_of_service') }}</a></li>
                    <li><a href="{{ route('privacy', app()->getLocale()) }}" class="text-white-50 text-decoration-none">{{ __('messages.privacy_policy') }}</a></li>
                </ul>
            </div>
        </div>

        {{-- Дисклеймер и копирайт --}}
        <div class="pt-4 mt-4 border-top border-secondary">
            <p class="text-center text-white-50" style="font-size: 0.8rem;">
                {{ __('messages.legal_disclaimer') }}
            </p>
            <p class="text-center text-white-50 mt-3">&copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.</p>
        </div>
    </div>
</footer>
