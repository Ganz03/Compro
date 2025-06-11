<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpbuSeeder extends Seeder
{
    public function run(): void
    {
        $spbus = [
            [
                'id' => 1,
                'code' => '44.595.13',
                'name' => 'Karangawen',
                'address' => 'Jl. Raya Karangawen, Kec. Karangawen',
                'city' => 'Demak',
                'province' => 'Jawa Tengah',
                'postal_code' => '59566',
                'phone' => '+62 8123-4567-890',
                'email' => 'spbu44.595.13@example.com',
                'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.666950100991!2d110.58964297574094!3d-7.0483664690676875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7093dff1ff9d71%3A0xeb05223b21eace68!2sSPBU%204459513%20Sidorejo%20Karangawen!5e0!3m2!1sen!2sid!4v1747619698854!5m2!1sen!2sid',
                'established_year' => 2007,
                'description' => 'SPBU 44.595.13 KARANGAWEN Merupakan SPBU pertama yang didirikan oleh Sidorejo pada tahun 2007 dan sampai saat ini masih beroperasi. Dengan lokasi yang strategis, SPBU ini melayani kebutuhan bahan bakar untuk masyarakat Karangawen dan sekitarnya dengan standar pelayanan terbaik.',
                'is_active' => 1,
                'slug' => 'karangawen',
                'hero_image' => 'karangawen.jpeg',
                'thumbnail_image' => 'karangawen.jpeg',
            ],
            [
                'id' => 2,
                'code' => '44.595.18',
                'name' => 'Bandungrejo',
                'address' => 'Jl. Raya Semarang - Demak No. Km. 13, Bandungrejo, Kec. Mranggen',
                'city' => 'Demak',
                'province' => 'Jawa Tengah',
                'postal_code' => '59567',
                'phone' => '+62 8567-8901-234',
                'email' => 'spbu44.595.18@gmail.com',
                'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.877253107699!2d110.50437507574073!3d-7.023711668809074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708d905c79c5c1%3A0xba33c5d46766c340!2sSPBU%20Bandungrejo!5e0!3m2!1sen!2sid!4v1747792768051!5m2!1sen!2sid',
                'established_year' => 2013,
                'description' => 'SPBU 44.595.18 BANDUNGREJO merupakan salah satu SPBU kami yang sudah didirikan pada tahun 2013. Dengan lokasi strategis di jalur Semarang-Demak, SPBU ini menyediakan berbagai jenis bahan bakar berkualitas dan dilengkapi fasilitas yang nyaman untuk para pengguna jalan.',
                'is_active' => 1,
                'slug' => 'bandungrejo',
                'hero_image' => 'bandungrejo.jpeg',
                'thumbnail_image' => 'bandungrejo.jpeg',
            ],
            [
                'id' => 3,
                'code' => '44.507.19',
                'name' => 'Bringin',
                'address' => 'Jl. Raya Bringin No. 45, Kec. Bringin',
                'city' => 'Semarang',
                'province' => 'Jawa Tengah',
                'postal_code' => '50552',
                'phone' => '+62 8234-5678-901',
                'email' => 'spbu44.507.19@gmail.com',
                'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253316.6766514429!2d110.24141069453124!3d-7.232506099999991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e709dcf654a89a9%3A0x62646b5b9d1a7c85!2sSPBU%20PERTAMINA%2044.507.19%20BRINGIN!5e0!3m2!1sen!2sid!4v1747791294064!5m2!1sen!2sid',
                'established_year' => 2019,
                'description' => 'SPBU 44.507.19 BRINGIN merupakan salah satu SPBU kami yang sudah didirikan pada tahun 2019. Dengan lokasi yang strategis di kawasan Bringin, Semarang, SPBU ini menawarkan layanan terbaik dengan dukungan staf yang profesional dan fasilitas modern.',
                'is_active' => 1,
                'slug' => 'bringin',
                'hero_image' => 'bringin.jpeg',
                'thumbnail_image' => 'bringin.jpeg',
            ],
            [
                'id' => 4,
                'code' => '44.581.24',
                'name' => 'Kaliceret',
                'address' => 'Jl. Raya Kaliceret No. 88, Kec. Purwokerto Utara',
                'city' => 'Banyumas',
                'province' => 'Jawa Tengah',
                'postal_code' => '53116',
                'phone' => '+62 8345-6789-012',
                'email' => 'spbu44.581.24@example.com',
                'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.1573647301834!2d110.64781898388725!3d-7.107754651357346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7097b2b4e5b301%3A0x62bdc991627ddb66!2sSpbu%2044.581.24%20Kaliceret!5e0!3m2!1sen!2sid!4v1747622974946!5m2!1sen!2sid',
                'established_year' => 2021,
                'description' => 'SPBU 44.581.24 KALICERET merupakan salah satu SPBU kami yang sudah didirikan pada tahun 2021. Sebagai SPBU termuda, kami membangun fasilitas dengan standar tertinggi dan mengutamakan pelayanan prima untuk memenuhi kebutuhan bahan bakar masyarakat Purwokerto.',
                'is_active' => 1,
                'slug' => 'kaliceret',
                'hero_image' => 'kaliceret.jpeg',
                'thumbnail_image' => 'kaliceret.jpeg',
            ],
        ];

        foreach ($spbus as $spbu) {
            $spbu['created_at'] = now();
            $spbu['updated_at'] = now();
            DB::table('spbus')->insert($spbu);
        }
    }
}
