<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;

class LanguageSwitcher extends Component
{
    /**
     * Список доступных локалей.
     * @var array
     */
    public array $availableLocales;

    /**
     * Текущая локаль приложения.
     * @var string
     */
    public string $currentLocale;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Получаем доступные локали из файла конфигурации (config/app.php)
        $this->availableLocales = config('app.available_locales', []);
        // Получаем текущий язык приложения
        $this->currentLocale = App::getLocale();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.language-switcher');
    }
}
