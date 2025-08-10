<?php

namespace App\Http\Controllers;

use App\Models\DocumentBundle;
use Illuminate\Http\Request;

class DocumentBundleController extends Controller
{
    /**
     * Отображает страницу со списком всех пакетов документов.
     */
    public function index()
    {
        $locale = app()->getLocale();

        // Названия стран для заголовков
        $countryNames = [
            'UA' => ['uk' => 'Україна', 'en' => 'Ukraine', 'pl' => 'Ukraina', 'de' => 'Ukraine', 'ru' => 'Украины'],
            'PL' => ['uk' => 'Польща', 'en' => 'Poland', 'pl' => 'Polska', 'de' => 'Polen', 'ru' => 'Польши'],
            'DE' => ['uk' => 'Німеччина', 'en' => 'Germany', 'pl' => 'Niemcy', 'de' => 'Deutschland', 'ru' => 'Германии'],
        ];

        // Загружаем активные пакеты с их шаблонами и группируем по странам
        $bundlesByCountry = DocumentBundle::where('is_active', true)
            ->with(['templates' => function ($query) {
                $query->where('is_active', true)->with('translation');
            }])
            ->get()
            ->groupBy('country_code');

        return view('bundles.index', compact('bundlesByCountry', 'countryNames', 'locale'));
    }

    /**
     * Показывает страницу с мастером для конкретного пакета документов.
     */
    public function show(Request $request, string $locale, DocumentBundle $bundle)
    {
        // Здесь уже есть проверка на Pro-доступ внутри Livewire компонента
        return view('bundles.show', compact('bundle'));
    }
}
