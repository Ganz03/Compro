<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'MIE AYAM PLOMBOKAN',
                'image' => 'mie-ayam-plombokan.jpg',
                'url' => null,
            ],
            [
                'name' => 'BANK BRI',
                'image' => 'bank-bri.png',
                'url' => 'https://bri.co.id/',
            ],
            [
                'name' => 'ALFAMART',
                'image' => 'alfamart.png',
                'url' => 'https://alfamart.co.id/',
            ],
            [
                'name' => 'INDOMARET',
                'image' => 'indomarett.png',
                'url' => 'https://www.indomaret.co.id/',
            ],
            [
                'name' => 'PT CIMB Niaga (ATM CIMB Niaga)',
                'image' => 'cimb.png',
                'url' => 'https://www.cimbniaga.co.id/id/personal/index',
            ],
            [
                'name' => 'PT Bank Negara Indonesia (ATM BNI)',
                'image' => 'bni.png',
                'url' => 'https://www.bni.co.id/id-id/',
            ],
            [
                'name' => 'PT Bank Tabungan Negara (ATM BTN)',
                'image' => 'BTN.png',
                'url' => 'https://www.btn.co.id/',
            ],
            [
                'name' => 'PT Bank Central Asia (ATM BCA)',
                'image' => 'bca.jpeg',
                'url' => 'https://www.bca.co.id/',
            ],
            [
                'name' => 'PT Poci Kreasi Mandiri (Es Teh Poci)',
                'image' => 'teh-poci.jpg',
                'url' => null,
            ],
            [
                'name' => 'Enduro Motor Service (Autocare Nitrogen)',
                'image' => 'enduro.jpg',
                'url' => null,
            ],
            [
                'name' => 'Cocoruyuk Fried Chick',
                'image' => 'cocoruyuk.jpeg',
                'url' => null,
            ],
            [
                'name' => 'UNDIP',
                'image' => 'undip.jpeg',
                'url' => 'https://undip.ac.id/',
            ],
        ];

        foreach ($partners as $partner) {
            $partner['created_at'] = now();
            $partner['updated_at'] = now();
            DB::table('partners')->insert($partner);
        }
    }
}