<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App; // Используем 'use' для чистоты кода
use Symfony\Component\HttpFoundation\Response;

class InitializeLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Получаем язык из первого сегмента URL (например, 'ru' из '/ru/login')
        $locale = $request->segment(1);

        // Проверяем, есть ли такой язык в списке доступных в конфиге
        if (in_array($locale, config('app.available_locales', []))) {
            // Устанавливаем язык для всего приложения
            App::setLocale($locale);
            // Сохраняем язык в сессию, чтобы он не терялся
            session()->put('locale', $locale);
        }

        return $next($request);
    }
}
