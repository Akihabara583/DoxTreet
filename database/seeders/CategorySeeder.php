<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Запускає наповнення бази даних для категорій.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = [
            // --- УКРАЇНА ---
            'work-ua' => [
                'country_code' => 'UA',
                'translations' => ['uk' => 'Бізнес і робота', 'en' => 'Business and Work', 'pl' => 'Biznes i praca', 'de' => 'Geschäft und Arbeit']
            ],
            'personal-family-ua' => [
                'country_code' => 'UA',
                'translations' => ['uk' => 'Особисті та сімейні', 'en' => 'Personal and Family', 'pl' => 'Osobiste i rodzinne', 'de' => 'Persönliches und Familie']
            ],
            'housing-issues-ua' => [
                'country_code' => 'UA',
                'translations' => ['uk' => 'Нерухомість', 'en' => 'Real Estate', 'pl' => 'Nieruchomości', 'de' => 'Immobilien']
            ],
            'legal-claims-ua' => [
                'country_code' => 'UA',
                'translations' => ['uk' => 'Юридичні документи', 'en' => 'Legal Documents', 'pl' => 'Dokumenty prawne', 'de' => 'Rechtsdokumente']
            ],
            'school-education-ua' => [
                'country_code' => 'UA',
                'translations' => ['uk' => 'Освіта', 'en' => 'Education', 'pl' => 'Edukacja', 'de' => 'Bildung']
            ],
            'medicine-ua' => [
                'country_code' => 'UA',
                'translations' => ['uk' => 'Здоров\'я та медицина', 'en' => 'Health and Medicine', 'pl' => 'Zdrowie i medycyna', 'de' => 'Gesundheit und Medizin']
            ],
            'automobiles-ua' => [
                'country_code' => 'UA',
                'translations' => ['uk' => 'Автомобілі', 'en' => 'Automobiles', 'pl' => 'Samochody', 'de' => 'Automobile']
            ],
            'events-travel-ua' => [
                'country_code' => 'UA',
                'translations' => ['uk' => 'Заходи та подорожі', 'en' => 'Events and Travel', 'pl' => 'Wydarzenia i podróże', 'de' => 'Veranstaltungen und Reisen']
            ],

            // --- ПОЛЬЩА ---
            'work-pl' => [
                'country_code' => 'PL',
                'translations' => ['pl' => 'Biznes i praca', 'uk' => 'Бізнес і робота', 'en' => 'Business and Work', 'de' => 'Geschäft und Arbeit']
            ],
            'personal-family-pl' => [
                'country_code' => 'PL',
                'translations' => ['pl' => 'Sprawy osobiste i rodzinne', 'uk' => 'Особисті та сімейні', 'en' => 'Personal and Family', 'de' => 'Persönliches und Familie']
            ],
            'housing-issues-pl' => [
                'country_code' => 'PL',
                'translations' => ['pl' => 'Nieruchomości', 'uk' => 'Нерухомість', 'en' => 'Real Estate', 'de' => 'Immobilien']
            ],
            'legal-claims-pl' => [
                'country_code' => 'PL',
                'translations' => ['pl' => 'Dokumenty prawne', 'uk' => 'Юридичні документи', 'en' => 'Legal Documents', 'de' => 'Rechtsdokumente']
            ],
            'school-education-pl' => [
                'country_code' => 'PL',
                'translations' => ['pl' => 'Edukacja', 'uk' => 'Освіта', 'en' => 'Education', 'de' => 'Bildung']
            ],
            'medicine-pl' => [
                'country_code' => 'PL',
                'translations' => ['pl' => 'Zdrowie i medycyna', 'uk' => 'Здоров\'я та медицина', 'en' => 'Health and Medicine', 'de' => 'Gesundheit und Medizin']
            ],
            'automobiles-pl' => [
                'country_code' => 'PL',
                'translations' => ['pl' => 'Samochody', 'uk' => 'Автомобілі', 'en' => 'Automobiles', 'de' => 'Automobile']
            ],
            'events-travel-pl' => [
                'country_code' => 'PL',
                'translations' => ['pl' => 'Wydarzenia i podróże', 'uk' => 'Заходи та подорожі', 'en' => 'Events and Travel', 'de' => 'Veranstaltungen und Reisen']
            ],

            // --- DE ---
            'work-de' => [
                'country_code' => 'DE',
                'translations' => ['pl' => 'Biznes i praca', 'uk' => 'Бізнес і робота', 'en' => 'Business and Work', 'de' => 'Geschäft und Arbeit']
            ],
            'personal-family-de' => [
                'country_code' => 'DE',
                'translations' => ['pl' => 'Sprawy osobiste i rodzinne', 'uk' => 'Особисті та сімейні', 'en' => 'Personal and Family', 'de' => 'Persönliches und Familie']
            ],
            'housing-issues-de' => [
                'country_code' => 'DE',
                'translations' => ['pl' => 'Nieruchomości', 'uk' => 'Нерухомість', 'en' => 'Real Estate', 'de' => 'Immobilien']
            ],
            'legal-claims-de' => [
                'country_code' => 'DE',
                'translations' => ['pl' => 'Dokumenty prawne', 'uk' => 'Юридичні документи', 'en' => 'Legal Documents', 'de' => 'Rechtsdokumente']
            ],
            'school-education-de' => [
                'country_code' => 'DE',
                'translations' => ['pl' => 'Edukacja', 'uk' => 'Освіта', 'en' => 'Education', 'de' => 'Bildung']
            ],
            'medicine-de' => [
                'country_code' => 'DE',
                'translations' => ['pl' => 'Zdrowie i medycyna', 'uk' => 'Здоров\'я та медицина', 'en' => 'Health and Medicine', 'de' => 'Gesundheit und Medizin']
            ],
            'automobiles-de' => [
                'country_code' => 'DE',
                'translations' => ['pl' => 'Samochody', 'uk' => 'Автомобілі', 'en' => 'Automobiles', 'de' => 'Automobile']
            ],
            'events-travel-de' => [
                'country_code' => 'DE',
                'translations' => ['pl' => 'Wydarzenia i podróże', 'uk' => 'Заходи та подорожі', 'en' => 'Events and Travel', 'de' => 'Veranstaltungen und Reisen']
            ],
        ];

        foreach ($categories as $slug => $data) {
            // Используем правильный синтаксис для создания/обновления
            // записи с переводимыми JSON-атрибутами.
            Category::updateOrCreate(
                ['slug' => $slug],
                [
                    'country_code' => $data['country_code'],
                    'name' => $data['translations'] // Просто передаем массив переводов
                ]
            );
        }
    }
}
