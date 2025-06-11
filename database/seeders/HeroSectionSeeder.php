<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hero_sections')->insert([
            'background_image' => 'background-image.jpg',
            'typed_line_1' => 'Pelayanan Prima Untuk',
            'typed_line_2' => 'Kenyamanan Anda',
            'description' => 'Energi untuk Hari Ini dan Masa Depan dengan Layanan Terpercaya yang Siap Memenuhi Kebutuhan Anda',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}