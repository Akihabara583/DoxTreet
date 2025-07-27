<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieConsentController extends Controller
{
    /**
     * Устанавливает cookie о согласии на длительный срок.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept(Request $request)
    {
        // Устанавливаем cookie "принято" на 5 лет
        $cookie = cookie('user_cookie_consent', 'accepted', 60 * 24 * 365 * 5);

        return back()->withCookie($cookie);
    }

    /**
     * Устанавливает сессионный cookie, чтобы скрыть баннер на время текущего визита.
     * Баннер появится снова при следующем заходе на сайт.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function decline(Request $request)
    {
        // ✅ ИСПРАВЛЕНИЕ: Мы снова устанавливаем cookie, но без времени жизни.
        // Это делает его сессионным - он будет удален, когда пользователь закроет браузер.
        // Middleware увидит этот cookie и скроет баннер на время сессии.
        $cookie = cookie('user_cookie_consent', 'declined');

        return back()->withCookie($cookie);
    }
}
