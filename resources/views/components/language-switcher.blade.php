@php
    // Получаем имя текущего роута
    $currentRouteName = Illuminate\Support\Facades\Route::currentRouteName();
    // Получаем все параметры текущего роута
    $currentRouteParams = Illuminate\Support\Facades\Route::current()->parameters();
@endphp

<div class="flex items-center space-x-2">
    {{-- Проходим по всем доступным языкам из конфига --}}
    @foreach (config('app.available_locales', []) as $locale)
        @php
            // Создаем новый набор параметров, заменяя только язык
            $newRouteParams = array_merge($currentRouteParams, ['locale' => $locale]);
        @endphp

        {{-- Генерируем ссылку на тот же роут, но с другим языком --}}
        <a href="{{ route($currentRouteName, $newRouteParams) }}"
           class="px-3 py-2 text-sm font-medium rounded-md
                  @if(app()->getLocale() == $locale)
                      bg-gray-700 text-white      {{-- Стиль для активного языка --}}
                  @else
                      text-gray-300 hover:bg-gray-500 hover:text-white {{-- Стиль для неактивного языка --}}
                  @endif">
            {{ strtoupper($locale) }}
        </a>
    @endforeach
</div>
