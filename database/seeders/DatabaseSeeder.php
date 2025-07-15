<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Database\Seeders\UA\UaWorkSeeder;
use \Database\Seeders\UA\UaPersonalFamilySeeder;
use \Database\Seeders\UA\UaRealEstateSeeder;
use \Database\Seeders\UA\UaLegalDocumentsSeeder;
use \Database\Seeders\UA\UaEducationSeeder;
use \Database\Seeders\UA\UaHealthMedicineSeeder;
use \Database\Seeders\UA\UaEventsTravelSeeder;
use \Database\Seeders\UA\UaCarsSeeder;

use \Database\Seeders\PL\PlWorkSeeder;
use \Database\Seeders\PL\PlPersonalFamilySeeder;
use \Database\Seeders\PL\PlRealEstateSeeder;
use \Database\Seeders\PL\PlLegalDocumentsSeeder;
use \Database\Seeders\PL\PlEducationSeeder;
use \Database\Seeders\PL\PlHealthMedicineSeeder;
use \Database\Seeders\PL\PlEventsTravelSeeder;
use \Database\Seeders\PL\PlCarsTravelSeeder;



class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TemplateSeeder::class,

            UaWorkSeeder::class,
            UaPersonalFamilySeeder::class,
            UaRealEstateSeeder::class,
            UaLegalDocumentsSeeder::class,
            UaEducationSeeder::class,
            UaHealthMedicineSeeder::class,
            UaEventsTravelSeeder::class,
            UaCarsSeeder::class,

            PlWorkSeeder::class,
            PlPersonalFamilySeeder::class,
            PlRealEstateSeeder::class,
            PlLegalDocumentsSeeder::class,
            PlEducationSeeder::class,
            PlHealthMedicineSeeder::class,
            PlEventsTravelSeeder::class,
            PlCarsTravelSeeder::class,
        ]);


    }
}
