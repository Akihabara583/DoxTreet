<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckCookieConsent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Если пользователь уже сделал выбор, ничего не делаем.
        if ($request->hasCookie('user_cookie_consent')) {
            return $next($request);
        }

        // Пользователь выбор не сделал, значит, баннер нужно показать в любом случае.
        View::share('showCookieConsentBanner', true);

        // ✅ ФИНАЛЬНОЕ ИСПРАВЛЕНИЕ:
        // Используем более надежный метод проверки URL, который работает с любыми языками.
        // Он проверяет, заканчивается ли URL на '/privacy' или '/terms'.
        $isLegalPage = $request->is('*/privacy') || $request->is('*/terms');

        // Если это не юридическая страница, показываем оверлей.
        if (!$isLegalPage) {
            View::share('showCookieConsentOverlay', true);
        }

        return $next($request);
    }
}
