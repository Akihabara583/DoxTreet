<?php

namespace App\Http\View\Composers;

use App\Models\Template;
use Illuminate\View\View;

class CountryNavigationComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Получаем из БД уникальные коды стран, у которых есть активные шаблоны
        $countryCodes = Template::query()
            ->where('is_active', true)
            ->whereNotNull('country_code')
            ->distinct()
            ->orderBy('country_code')
            ->pluck('country_code');

        // Преобразуем коды в объекты с названием
        $countries = $countryCodes->map(function ($code) {
            return (object)[
                'code' => $code,
                'name' => $this->getCountryName($code)
            ];
        });

        // Передаем переменную $countriesForNav в view
        $view->with('countriesForNav', $countries);
    }

    /**
     * Возвращает название страны из конфига.
     */
    private function getCountryName(string $code): string
    {
        // Ключ формується як 'messages.country_de', 'messages.country_pl' і т.д.
        $key = 'messages.country_' . strtolower($code);
        return __($key);
    }
}
