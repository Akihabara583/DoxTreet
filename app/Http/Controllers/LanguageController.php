<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{
    /**
     * Switch the application language and redirect to the same page with the new locale.
     *
     * @param string $language
     * @return RedirectResponse
     */
    public function switch(string $language): RedirectResponse
    {
        // 1. Проверяем, что запрашиваемый язык поддерживается
        if (!in_array($language, config('app.available_locales'))) {
            // Если нет, просто возвращаемся назад без изменений
            return back();
        }

        // 2. Устанавливаем язык для текущего контекста и сохраняем в сессию
        App::setLocale($language);
        session()->put('locale', $language);

        // 3. Получаем URL предыдущей страницы
        $previousUrl = URL::previous();
        $path = ltrim(parse_url($previousUrl, PHP_URL_PATH), '/');
        $segments = explode('/', $path);

        // 4. Проверяем, был ли на предыдущей странице языковой префикс
        if (in_array($segments[0], config('app.available_locales'))) {
            // Если был - заменяем его на новый язык
            $segments[0] = $language;
        } else {
            // Если не было (например, это была страница /login),
            // то просто перенаправим на главную страницу с новым языком.
            return redirect()->route('home', ['locale' => $language]);
        }

        // 5. Собираем новый URL и перенаправляем пользователя
        $newPath = implode('/', $segments);
        $queryString = parse_url($previousUrl, PHP_URL_QUERY);
        if ($queryString) {
            $newPath .= '?' . $queryString;
        }

        return redirect($newPath);
    }
}
