<?php

namespace Database\Seeders\US;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\Category;

class UsHealthMedicineSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::where('slug', 'work-us')->first();
        if (!$category) {
            $this->command->error('Category with slug "work-us" not found.');
            return;
        }


        $templatesData = [


        ];


        foreach ($templatesData as $templateData) {
            $this->createTemplate($category->id, $templateData);
        }
    }

    private function createTemplate(int $categoryId, array $data): void
    {
        $template = Template::updateOrCreate(
            ['slug' => $data['slug']],
            [
                'category_id' => $categoryId,
                'is_active' => $data['is_active'] ?? true,
                'country_code' => $data['country_code'] ?? 'US',
                'fields' => json_decode($data['fields'], true),
            ]
        );

        if (isset($data['translations']) && is_array($data['translations'])) {
            foreach ($data['translations'] as $locale => $transData) {
                // Ensure all languages have HTML content by falling back to Polish version if empty
                $transData['header_html'] = $transData['header_html'] ?? ($data['translations']['us']['header_html'] ?? '');
                $transData['body_html'] = $transData['body_html'] ?? ($data['translations']['us']['body_html'] ?? '');
                $transData['footer_html'] = $transData['footer_html'] ?? ($data['translations']['us']['footer_html'] ?? '');

                $template->translations()->updateOrCreate(['locale' => $locale], $transData);
            }
        }
    }
}
