<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// Мы убрали 'use App' и 'use URL', так как укажем полный путь ниже
use Symfony\Component\HttpFoundation\Response;

class InitializeLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);
        $available_locales = config('app.available_locales', ['en']);

        if (in_array($locale, $available_locales)) {
            // Здесь мы используем полный путь к классу, чтобы PhpStorm его понял
            \Illuminate\Support\Facades\App::setLocale($locale);

            // И здесь тоже используем полный путь
            \Illuminate\Support\Facades\URL::defaults(['locale' => $locale]);
        }
        // Мы убрали блок 'else' с редиректом, так как он мешал работе роутов авторизации.
        // Laravel сам обработает некорректные URL.

        return $next($request);
    }
}
