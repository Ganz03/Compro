<?php

namespace Database\Seeders;
use App\Models\HeroSection;
use App\Models\AboutUs;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        HeroSection::create([
            'background_image' => 'background-image.jpg', // Path to the background image
            'typed_line_1' => 'Pelayanan Prima Untuk', // Text for typed line 1
            'typed_line_2' => 'Kenyamanan Anda', // Text for typed line 2
            'description' => 'Energi untuk Hari Ini dan Masa Depan dengan Layanan Terpercaya yang Siap Memenuhi Kebutuhan Anda', // Description text
        ]);

        AboutUs::create([
            'company_name' => 'PT SIDOREJO MAKMUR SEJAHTERA', 
            'company_description' => 'PT SIDOREJO MAKMUR SEJAHTERA adalah perusahaan yang bergerak dalam bidang migas dan retail.',
            'image_name' => 'station-image1.jpg', // Gantilah dengan nama file gambar yang sesuai
        ]);

        $this->call([
            NewsSeeder::class,
        ]);

        
        


    }
}
