<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use \Database\Seeders\UA\UaCategorySeeder;
use \Database\Seeders\UA\UaWorkSeeder;
use \Database\Seeders\UA\UaPersonalFamilySeeder;
use \Database\Seeders\UA\UaRealEstateSeeder;
use \Database\Seeders\UA\UaLegalDocumentsSeeder;
use \Database\Seeders\UA\UaEducationSeeder;
use \Database\Seeders\UA\UaHealthMedicineSeeder;
use \Database\Seeders\UA\UaEventsTravelSeeder;
use \Database\Seeders\UA\UaCarsSeeder;

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
            UaPersonalFamilySeeder::class,
            UaRealEstateSeeder::class,
            UaLegalDocumentsSeeder::class,
            UaEducationSeeder::class,
            UaHealthMedicineSeeder::class,
            UaEventsTravelSeeder::class,
            UaCarsSeeder::class,
        ]);


    }
}
