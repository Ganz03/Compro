<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run()
    {
        Partner::create([
            'name' => 'MIE AYAM PLOMBOKAN',
            'image' => 'mie-ayam-plombokan.jpg',
            'url' => '',
        ]);

        Partner::create([
            'name' => 'BANK BRI',
            'image' => 'bank-bri.png',
            'url' => 'https://bri.co.id/',
        ]);

        Partner::create([
            'name' => 'ALFAMART',
            'image' => 'alfamart.png',
            'url' => 'https://alfamart.co.id/',
        ]);
    }
}