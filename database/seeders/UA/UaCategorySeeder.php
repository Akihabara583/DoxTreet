<?php

namespace Database\Seeders\UA;

use Illuminate\Database\Seeder;
use App\Models\Category;

class UaCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            // SLUG => [UK, EN, PL, DE]
            'work' => ['Бізнес і робота', 'Business and Work', 'Biznes i praca', 'Geschäft und Arbeit'],
            'personal-family' => ['Особисті та сімейні', 'Personal and Family', 'Osobiste i rodzinne', 'Persönliches und Familie'],
            'housing-issues' => ['Нерухомість', 'Real Estate', 'Nieruchomości', 'Immobilien'],
            'legal-claims' => ['Юридичні документи', 'Legal Documents', 'Dokumenty prawne', 'Rechtsdokumente'],
            'school-education' => ['Освіта', 'Education', 'Edukacja', 'Bildung'],
            'medicine' => ['Здоров\'я та медицина', 'Health and Medicine', 'Zdrowie i medycyna', 'Gesundheit und Medizin'],
            'automobiles' => ['Автомобілі', 'Automobiles', 'Samochody', 'Automobile'],
            'events-travel' => ['Заходи та подорожі', 'Events and Travel', 'Wydarzenia i podróże', 'Veranstaltungen und Reisen'],
        ];

        foreach ($categories as $slug => $names) {
            Category::updateOrCreate(['slug' => $slug]);
        }
    }
}
