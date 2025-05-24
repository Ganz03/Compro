<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\Spbu;
use App\Models\Team;
use Illuminate\Database\Seeder;

class SpbuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SPBU 1: Karangawen
        $spbu1 = Spbu::create([
            'code' => '44.595.13',
            'name' => 'Karangawen',
            'address' => 'Jl. Raya Karangawen, Kec. Karangawen',
            'city' => 'Demak',
            'province' => 'Jawa Tengah',
            'postal_code' => '59566',
            'phone' => '+62 8123-4567-890',
            'email' => 'spbu44.595.13@example.com',
            'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.157746016348!2d110.65241719999999!3d-7.107710399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7097b2b4e5b301%3A0x62bdc991627ddb66!2sSpbu%2044.595.13%20Karangawen!5e0!3m2!1sen!2sid!4v1746631467945!5m2!1sen!2sid',
            'established_year' => 2007,
            'description' => 'SPBU 44.595.13 KARANGAWEN Merupakan SPBU pertama yang didirikan oleh Sidorejo pada tahun 2007 dan sampai saat ini masih beroperasi. Dengan lokasi yang strategis, SPBU ini melayani kebutuhan bahan bakar untuk masyarakat Karangawen dan sekitarnya dengan standar pelayanan terbaik.',
            'is_active' => true,
            'slug' => 'karangawen',
            'hero_image' => null, // Will be set by file upload in Filament
            'thumbnail_image' => null, // Will be set by file upload in Filament
        ]);

        // Team Members for Karangawen
        Team::create([
            'spbu_id' => $spbu1->id,
            'name' => 'Sutrisno',
            'position' => 'Kepala SPBU',
            'photo' => 'team-photos/person1.png', // This will be updated via Filament
            'order' => 1,
            'is_active' => true,
        ]);

        Team::create([
            'spbu_id' => $spbu1->id,
            'name' => 'Dewi Susanti',
            'position' => 'Admin dan Keuangan',
            'photo' => 'team-photos/person2.png', // This will be updated via Filament
            'order' => 2,
            'is_active' => true,
        ]);

        // Facilities for Karangawen
        $facilities = [
            [
                'name' => 'MINIMARKET',
                'image' => 'facilities/minimarket.png',
                'description' => 'Mini market untuk kebutuhan sehari-hari',
                'order' => 1,
            ],
            [
                'name' => 'NITROGEN',
                'image' => 'facilities/nitrogen.png',
                'description' => 'Pengisian nitrogen untuk ban kendaraan',
                'order' => 2,
            ],
            [
                'name' => 'AIR dan ANGIN GRATIS',
                'image' => 'facilities/air-angin-gratis.png',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'order' => 3,
            ],
            [
                'name' => 'OLI',
                'image' => 'facilities/oli.png',
                'description' => 'Menjual berbagai merek oli kendaraan',
                'order' => 4,
            ],
            [
                'name' => 'TOILET',
                'image' => 'facilities/toilet.png',
                'description' => 'Toilet bersih dan nyaman',
                'order' => 5,
            ],
            [
                'name' => 'MUSHOLLA',
                'image' => 'facilities/musholla.png',
                'description' => 'Tempat ibadah yang nyaman',
                'order' => 6,
            ],
        ];

        foreach ($facilities as $facility) {
            Facility::create([
                'spbu_id' => $spbu1->id,
                'name' => $facility['name'],
                'image' => $facility['image'],
                'description' => $facility['description'],
                'order' => $facility['order'],
                'is_active' => true,
            ]);
        }

        // SPBU 2: Bandungrejo
        $spbu2 = Spbu::create([
            'code' => '44.595.18',
            'name' => 'Bandungrejo',
            'address' => 'Jl. Raya Semarang - Demak No. Km. 13, Bandungrejo, Kec. Mranggen',
            'city' => 'Demak',
            'province' => 'Jawa Tengah',
            'postal_code' => '59567',
            'phone' => '+62 8567-8901-234',
            'email' => 'spbu44.595.18@example.com',
            'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0!2d110.7!3d-7.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMCcwLjAiUyAxMTDCsDQyJzAuMCJF!5e0!3m2!1sen!2sid!4v1746631467945!5m2!1sen!2sid',
            'established_year' => 2013,
            'description' => 'SPBU 44.595.18 BANDUNGREJO merupakan salah satu SPBU kami yang sudah didirikan pada tahun 2013. Dengan lokasi strategis di jalur Semarang-Demak, SPBU ini menyediakan berbagai jenis bahan bakar berkualitas dan dilengkapi fasilitas yang nyaman untuk para pengguna jalan.',
            'is_active' => true,
            'slug' => 'bandungrejo',
            'hero_image' => null,
            'thumbnail_image' => null,
        ]);

        // Team Members for Bandungrejo
         Team::create([
              'spbu_id' => $spbu2->id,
              'name' => 'Budi Santoso',
              'position' => 'Manager',
              'photo' => 'team-photos/person3.png',
              'order' => 1,
              'is_active' => true,
          ]);

          Team::create([
              'spbu_id' => $spbu2->id,
              'name' => 'Rina Wijaya',
              'position' => 'Admin',
              'photo' => 'team-photos/person4.png',
              'order' => 2,
              'is_active' => true,
          ]);

          // Similar facilities for Bandungrejo
          foreach ($facilities as $facility) {
              Facility::create([
                  'spbu_id' => $spbu2->id,
                  'name' => $facility['name'],
                  'image' => $facility['image'],
                  'description' => $facility['description'],
                  'order' => $facility['order'],
                  'is_active' => true,
              ]);
          }

          // SPBU 3: Bringin
          $spbu3 = Spbu::create([
              'code' => '44.507.19',
              'name' => 'Bringin',
              'address' => 'Jl. Raya Bringin No. 45, Kec. Bringin',
              'city' => 'Semarang',
              'province' => 'Jawa Tengah',
              'postal_code' => '50552',
              'phone' => '+62 8234-5678-901',
              'email' => 'spbu44.507.19@example.com',
              'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2!2d110.5!3d-7.01!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMCczNi4wIlMgMTEwwrAzMCcwLjAiRQ!5e0!3m2!1sen!2sid!4v1746631467945!5m2!1sen!2sid',
              'established_year' => 2019,
              'description' => 'SPBU 44.507.19 BRINGIN merupakan salah satu SPBU kami yang sudah didirikan pada tahun 2019. Dengan lokasi yang strategis di kawasan Bringin, Semarang, SPBU ini menawarkan layanan terbaik dengan dukungan staf yang profesional dan fasilitas modern.',
              'is_active' => true,
              'slug' => 'bringin',
              'hero_image' => null,
              'thumbnail_image' => null,
          ]);

          // Team for Bringin
          Team::create([
              'spbu_id' => $spbu3->id,
              'name' => 'Hadi Purnomo',
              'position' => 'Supervisor',
              'photo' => 'team-photos/person5.png',
              'order' => 1,
              'is_active' => true,
          ]);

          // Facilities for Bringin
          foreach ($facilities as $facility) {
              Facility::create([
                  'spbu_id' => $spbu3->id,
                  'name' => $facility['name'],
                  'image' => $facility['image'],
                  'description' => $facility['description'],
                  'order' => $facility['order'],
                  'is_active' => true,
              ]);
          }

          // SPBU 4: Kaliceret
          $spbu4 = Spbu::create([
              'code' => '44.581.24',
              'name' => 'Kaliceret',
              'address' => 'Jl. Raya Kaliceret No. 88, Kec. Purwokerto Utara',
              'city' => 'Banyumas',
              'province' => 'Jawa Tengah',
              'postal_code' => '53116',
              'phone' => '+62 8345-6789-012',
              'email' => 'spbu44.581.24@example.com',
              'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.8!2d110.4!3d-7.05!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMyczMC4wIlMgMTEwwrAyNCcwLjAiRQ!5e0!3m2!1sen!2sid!4v1746631467945!5m2!1sen!2sid',
              'established_year' => 2021,
              'description' => 'SPBU 44.581.24 KALICERET merupakan salah satu SPBU kami yang sudah didirikan pada tahun 2021. Sebagai SPBU termuda, kami membangun fasilitas dengan standar tertinggi dan mengutamakan pelayanan prima untuk memenuhi kebutuhan bahan bakar masyarakat Purwokerto.',
              'is_active' => true,
              'slug' => 'kaliceret',
              'hero_image' => null,
              'thumbnail_image' => null,
          ]);

          // Team for Kaliceret
          Team::create([
              'spbu_id' => $spbu4->id,
              'name' => 'Ani Wulandari',
              'position' => 'Manager',
              'photo' => 'team-photos/person6.png',
              'order' => 1,
              'is_active' => true,
          ]);

          Team::create([
              'spbu_id' => $spbu4->id,
              'name' => 'Rudi Hartono',
              'position' => 'Admin',
              'photo' => 'team-photos/person7.png',
              'order' => 2,
              'is_active' => true,
          ]);

          // Facilities for Kaliceret
          foreach ($facilities as $facility) {
              Facility::create([
                  'spbu_id' => $spbu4->id,
                  'name' => $facility['name'],
                  'image' => $facility['image'],
                  'description' => $facility['description'],
                  'order' => $facility['order'],
                  'is_active' => true,
              ]);
          }
      }
  }