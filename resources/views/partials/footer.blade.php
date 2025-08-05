<footer class="bg-dark text-white mt-auto">
    {{-- ✅ ИЗМЕНЕНО: Увеличен вертикальный отступ для всего футера (py-5) --}}
    <div class="container py-5">
        <div class="row">
            {{-- Колонка 1: Описание --}}
            <div class="row justify-content-between">
                {{-- Колонка 1: Описание. Можно вернуть col-lg-4, т.к. ширина теперь не так важна --}}
                <div class="col-lg-5 col-md-12 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-3">{{ config('app.name', 'DoxTreet') }}<sup>&trade;</sup></h5>
                    <p class="text-white-50">{{ __('messages.seo_default_description') }}</p>
                </div>

                {{-- Колонка 2: Навигация --}}
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">{{ __('messages.navigation') }}</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a href="{{ route('home', app()->getLocale()) }}" class="text-white-50 text-decoration-none footer-link">{{ __('messages.home') }}</a></li>
                        <li class="mb-3"><a href="{{ route('faq', app()->getLocale()) }}" class="text-white-50 text-decoration-none footer-link">{{ __('messages.faq') }}</a></li>
                        <li class="mb-3"><a href="{{ route('about', app()->getLocale()) }}" class="text-white-50 text-decoration-none footer-link">{{ __('messages.about_us') }}</a></li>
                        @auth
                            <li class="mb-3"><a href="{{ route('profile.show', app()->getLocale()) }}" class="text-white-50 text-decoration-none footer-link">{{ __('messages.my_profile') }}</a></li>
                        @endauth
                    </ul>
                </div>

                {{-- Колонка 3: Правовая информация --}}
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">{{ __('messages.legal') }}</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3"><a href="{{ route('terms', app()->getLocale()) }}" class="text-white-50 text-decoration-none footer-link">{{ __('messages.terms_of_service') }}</a></li>
                        <li class="mb-3"><a href="{{ route('privacy', app()->getLocale()) }}" class="text-white-50 text-decoration-none footer-link">{{ __('messages.privacy_policy') }}</a></li>
                    </ul>
                </div>
            </div>
        {{-- Дисклеймер и копирайт --}}
        <div class="pt-4 mt-4 border-top border-secondary-subtle">
            <p class="text-center text-white-50 small">
                {{ __('messages.legal_disclaimer') }}
            </p>
            <p class="text-center text-white-50 small mt-2">&copy; {{ date('Y') }} {{ config('app.name') }}<sup>&trade;</sup>. All Rights Reserved.</p>
        </div>
    </div>
</footer>
