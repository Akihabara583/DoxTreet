<?php

namespace App\Http\Controllers;

use App\Models\Template; // ✅ Убедитесь, что модель подключена
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentListController extends Controller
{
    public function index(string $locale): View
    {
        // 1. Получаем из БД все уникальные коды стран, у которых есть активные шаблоны
        $countryCodes = Template::query()
            ->where('is_active', true)
            ->whereNotNull('country_code')
            ->distinct()
            ->pluck('country_code');

        $countries = [];

        // 2. Для каждого кода страны получаем её активные шаблоны
        foreach ($countryCodes as $countryCode) {
            $documents = Template::query()
                ->with('translation') // Загружаем перевод для текущего языка
                ->where('country_code', $countryCode)
                ->where('is_active', true)
                ->get();

            // Пропускаем страну, если у нее нет документов (на всякий случай)
            if ($documents->isEmpty()) {
                continue;
            }

            $countries[] = [
                'code' => $countryCode,
                'name' => $this->getCountryName($countryCode, $locale),
                'documents' => $documents
            ];
        }

        return view('documents.index', [
            'countries' => $countries,
            'currentLocale' => $locale
        ]);
    }
    public function showByCountry(string $locale, string $countryCode): View
    {
        $countryName = $this->getCountryName($countryCode, $locale);

        // ✅ ИЗМЕНЕНИЕ ЗДЕСЬ:
        // Мы больше не загружаем ->with('translation') для категорий,
        // так как модель сама берет перевод из lang-файлов.
        $categories = Category::with(['templates' => function ($query) use ($countryCode) {
            $query->where('country_code', $countryCode)
                ->where('is_active', true)
                ->with('translation'); // Оставляем это для шаблонов
        }])
            ->whereHas('templates', function ($query) use ($countryCode) {
                $query->where('country_code', $countryCode)->where('is_active', true);
            })
            ->get();

        return view('documents.show_by_country', [
            'countryName' => $countryName,
            'categories' => $categories,
            'currentLocale' => $locale
        ]);
    }
    private function getCountryName(string $code, string $locale): string
    {
        $key = 'messages.country_' . strtolower($code);
        // Ми передаємо $locale як третій аргумент, щоб переклад був на потрібній мові
        return trans($key, [], $locale);
    }
}
