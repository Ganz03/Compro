<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HeroSectionSeeder::class,
            AboutUsSeeder::class,
            AboutUsDetailSeeder::class,
            VisiMisiSeeder::class,
            SpbuSeeder::class,
            TeamSeeder::class,
            FacilitySeeder::class,
            PartnerSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            CareerSeeder::class,
        ]);
    }
}