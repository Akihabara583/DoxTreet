<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use \Database\Seeders\UA\UaCategorySeeder;
use \Database\Seeders\UA\UaWorkSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TemplateSeeder::class,
            UaCategorySeeder::class,
            UaWorkSeeder::class,

        ]);


    }
}
