<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'housing-issues', 'school-education', 'work',
            'legal-claims', 'government-agencies', 'medicine',
            'personal-family', 'automobiles', 'events-travel',
        ];
        foreach ($categories as $slug) {
            Category::create(['slug' => $slug]);
        }
    }
}
