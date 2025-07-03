@if(isset($countriesForNav) && $countriesForNav->isNotEmpty())
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCountry" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('messages.docs_by_country') }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownCountry">
            @foreach($countriesForNav as $country)
                <li>
                    <a class="dropdown-item" href="{{ route('documents.by_country', ['locale' => app()->getLocale(), 'countryCode' => $country->code]) }}">
                        {{-- Для иконок флагов можно использовать пакет, например, 'flag-icons' --}}
                        {{-- <span class="fi fi-{{ strtolower($country->code) }} me-2"></span> --}}
                        {{ $country->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
@endif
