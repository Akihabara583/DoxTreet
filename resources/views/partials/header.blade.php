<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container">
            {{-- ИЗМЕНЕНО: Добавлен SVG-логотип и новое название --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home', ['locale' => app()->getLocale()]) }}">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-2">
                    <path d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="#0D6EFD" fill-opacity="0.3"/>
                    <path d="M14 2V8H20" stroke="#0D6EFD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 13H15" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 17H15" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="fw-bold">{{ config('app.name', 'DoxTreet') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home', ['locale' => app()->getLocale()]) }}#templates">{{ __('messages.templates') }}</a>
                    </li>

                    {{-- === ВОТ НОВАЯ ССЫЛКА НА БЛОГ === --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}" href="{{ route('posts.index', ['locale' => app()->getLocale()]) }}">
                            {{ __('messages.blog') }}
                        </a>
                    </li>
                    {{-- =================================== --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pricing', ['locale' => app()->getLocale()]) }}">{{ __('messages.pricing') }}</a>
                    </li>
                    @include('partials._country_nav')
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Language Switcher -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLang" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-translate"></i> {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownLang">
                            @foreach(config('app.available_locales') as $locale_code)
                                @php
                                    $currentRouteName = Route::currentRouteName();
                                    $currentParameters = Route::current()->parameters();
                                    $currentParameters['locale'] = $locale_code;

                                    $url = (Route::current()->hasParameter('locale') && $currentRouteName)
                                           ? route($currentRouteName, $currentParameters)
                                           : route('home', ['locale' => $locale_code]);
                                @endphp
                                <li>
                                    <a class="dropdown-item" href="{{ $url }}">
                                        {{ strtoupper($locale_code) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary btn-sm text-white px-3" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                            </li>
                        @endif
                    @else
                        {{-- ОБНОВЛЕННЫЙ БЛОК ДЛЯ АВТОРИЗОВАННОГО ПОЛЬЗОВАТЕЛЯ --}}
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
