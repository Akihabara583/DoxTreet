<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                <x-application-logo class="me-2" style="width: 32px; height: 32px;" />
                <span class="fw-bold">{{ config('app.name', 'DoxTreet') }}<sup>&trade;</sup></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home', ['locale' => app()->getLocale()]) }}#templates">{{ __('messages.templates') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index', ['locale' => app()->getLocale()]) }}">
                            {{ __('messages.blog') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pricing', ['locale' => app()->getLocale()]) }}">{{ __('messages.pricing') }}</a>
                    </li>
                    @include('partials._country_nav')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sign.index', ['locale' => app()->getLocale()]) }}">
                            <i class="bi  me-1"></i> {{ __('messages.sign_document') }}
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLang" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-translate"></i>
                            {{-- ✅ ИЗМЕНЕНИЕ №1: Отображение текущего языка --}}
                            @if(app()->getLocale() == 'uk')
                                UA
                            @else
                                {{ strtoupper(app()->getLocale()) }}
                            @endif
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownLang">
                            {{-- ✅ ИЗМЕНЕНИЕ №1: Упрощенная и надежная логика ссылок --}}
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
                    </li>

                    @guest
                        {{-- ✅ ИЗМЕНЕНИЕ №2: Добавлен параметр языка в роуты --}}
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('messages.login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary btn-sm text-white px-3" href="{{ route('register', app()->getLocale()) }}">{{ __('messages.register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.show', ['locale' => app()->getLocale()]) }}">
                                    <i class="bi bi-person-square me-2"></i>{{ __('messages.my_account') }}
                                </a>
                                @if(Auth::user()->is_admin)
                                    <a class="dropdown-item" href="{{ route('admin.dashboard', ['locale' => app()->getLocale()]) }}">
                                        <i class="bi bi-shield-lock me-2"></i>{{ __('messages.admin_panel') }}
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>{{ __('messages.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<div style="padding-top: 56px;"></div>
