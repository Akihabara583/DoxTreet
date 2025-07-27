<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class EnsureLocaleForApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Если в маршруте нет параметра 'locale' (как в нашем вебхуке)
        if (!$request->route('locale')) {
            // Устанавливаем язык по умолчанию для этого запроса
            App::setLocale(config('app.fallback_locale', 'en'));
        }

        return $next($request);
    }
}
