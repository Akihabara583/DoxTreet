<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * This middleware checks if a 'locale' is set in the session and if it's a valid,
     * supported language. If so, it sets the application's locale for the current request.
     * This ensures that the user's language choice persists across all pages.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем, есть ли язык в сессии и поддерживается ли он
        if (Session::has('locale') && in_array(Session::get('locale'), config('app.available_locales', []))) {
            // Устанавливаем язык для приложения
            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }
}
