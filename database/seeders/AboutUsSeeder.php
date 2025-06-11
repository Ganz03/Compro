<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('about_us')->insert([
            'id' => 1,
            'company_name' => 'PT SIDOREJO MAKMUR SEJAHTERA',
            'company_description' => 'PT SIDOREJO MAKMUR SEJAHTERA adalah perusahaan yang bergerak dalam bidang migas dan retail.',
            'image_name' => 'logo.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}