<?php

/*
|--------------------------------------------------------------------------
| LARAVEL DATABASE SEEDER - PT SIDOREJO MAKMUR SEJAHTERA
|--------------------------------------------------------------------------
|
| File seeder lengkap untuk semua tabel database PT Sidorejo Makmur Sejahtera.
| 
| Cara menjalankan:
| php artisan db:seed
| 
| Untuk reset dan seed ulang:
| php artisan migrate:fresh --seed
|
*/

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            'seedUsers',
            'seedHeroSections',
            'seedAboutUs',
            'seedAboutUsDetails',
            'seedVisiMisi',
            'seedPartners',
            'seedNewsCategories',
            'seedNews',
            'seedSpbus',
            'seedTeams',
            'seedFacilities',
            'seedContacts',
        ]);

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function seedUsers()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'arganapulungan@gmail.com',
            'email_verified_at' => null,
            'password' => '$2y$12$5vrFr.JNO0wccjq1K.0..uXmIAV5jLOq5c5yYNvaEJFzif2uWbTOe',
            'remember_token' => null,
            'created_at' => '2025-05-12 02:36:45',
            'updated_at' => '2025-05-12 02:36:45',
        ]);
    }

    private function seedHeroSections()
    {
        DB::table('hero_sections')->truncate();
        DB::table('hero_sections')->insert([
            'id' => 1,
            'background_image' => 'background-image.jpg',
            'typed_line_1' => 'Pelayanan Prima Untuk',
            'typed_line_2' => 'Kenyamanan Anda',
            'description' => 'Energi untuk Hari Ini dan Masa Depan dengan Layanan Terpercaya yang Siap Memenuhi Kebutuhan Anda',
            'created_at' => '2025-05-12 02:02:02',
            'updated_at' => '2025-05-12 02:02:02',
        ]);
    }

    private function seedAboutUs()
    {
        DB::table('about_us')->truncate();
        DB::table('about_us')->insert([
            'id' => 1,
            'company_name' => 'PT SIDOREJO MAKMUR SEJAHTERA',
            'company_description' => 'PT SIDOREJO MAKMUR SEJAHTERA adalah perusahaan yang bergerak dalam bidang migas dan retail.',
            'image_name' => 'logo.jpg',
            'created_at' => '2025-05-12 02:02:02',
            'updated_at' => '2025-05-18 07:58:51',
        ]);
    }

    private function seedAboutUsDetails()
    {
        DB::table('about_us_details')->truncate();
        DB::table('about_us_details')->insert([
            'id' => 1,
            'company_name' => 'PT SIDOREJO MAKMUR SEJAHTERA',
            'company_description' => 'PT Sidorejo Makmur Sejahtera merupakan perusahaan yang bergerak di bidang migas dan retail, dengan komitmen untuk menyediakan layanan energi dan kebutuhan sehari-hari yang berkualitas bagi masyarakat. Sejak awal berdirinya, perusahaan terus memperluas jaringan usahanya, khususnya melalui pengelolaan Stasiun Pengisian Bahan Bakar Umum (SPBU) yang tersebar di berbagai wilayah strategis.

Cabang pertama yang didirikan adalah SPBU 44.595.13 Karangawen pada tahun 2007. SPBU ini menjadi fondasi awal kegiatan operasional perusahaan dan hingga saat ini masih aktif melayani masyarakat sekitar dengan layanan yang andal. Kemudian, pada tahun 2013, perusahaan membuka SPBU 44.595.18 Bandungrejo sebagai bentuk ekspansi untuk menjangkau lebih banyak pelanggan di wilayah berbeda.

Perkembangan berlanjut dengan berdirinya SPBU 44.507.19 yang berlokasi di Bringin pada tahun 2019. Kehadiran SPBU ini memperkuat posisi perusahaan dalam industri migas, khususnya dalam hal distribusi bahan bakar yang mudah diakses dan terpercaya. Terakhir, pada tahun 2021, PT Sidorejo Makmur Sejahtera mendirikan SPBU 44.581.24 Kaliceret sebagai cabang keempat, memperluas cakupan layanan dan menegaskan komitmen perusahaan terhadap pertumbuhan berkelanjutan.',
            'image' => 'logo.png',
            'created_at' => '2025-05-14 10:08:19',
            'updated_at' => '2025-05-17 02:51:42',
        ]);
    }

    private function seedVisiMisi()
    {
        DB::table('visi_misi')->truncate();
        DB::table('visi_misi')->insert([
            'id' => 1,
            'visi' => 'Menjadi SPBU yang handal dan tangguh dengan memberikan pelayanan terbaik, memastikan kualitas yang dapat diandalkan, serta menciptakan nilai positif yang menjadikan kami terpercaya dan bernilai di mata masyarakat.',
            'misi' => 'Mempermudah masyarakat dalam pengisian BBM, memberikan pelayanan yang nyaman, membuka peluang kerja bagi lingkungan sekitar, menjaga kualitas pelayanan dengan mengedepankan slogan PASTI PAS, dan menunjukkan kepedulian terhadap masyarakat sekitar lingkungan SPBU.',
            'created_at' => '2025-05-12 07:05:43',
            'updated_at' => '2025-05-12 07:05:43',
        ]);
    }

    private function seedPartners()
    {
        DB::table('partners')->truncate();
        $partners = [
            [
                'id' => 1,
                'name' => 'MIE AYAM PLOMBOKAN',
                'image' => 'mie-ayam-plombokan.jpg',
                'url' => null,
                'created_at' => '2025-05-14 08:05:01',
                'updated_at' => '2025-05-14 08:05:35',
            ],
            [
                'id' => 2,
                'name' => 'BANK BRI',
                'image' => 'bank-bri.png',
                'url' => 'https://bri.co.id/',
                'created_at' => '2025-05-14 08:05:01',
                'updated_at' => '2025-05-14 08:05:01',
            ],
            [
                'id' => 3,
                'name' => 'ALFAMART',
                'image' => 'alfamart.png',
                'url' => 'https://alfamart.co.id/',
                'created_at' => '2025-05-14 08:05:01',
                'updated_at' => '2025-05-14 08:05:01',
            ],
        ];

        foreach ($partners as $partner) {
            DB::table('partners')->insert($partner);
        }
    }

    private function seedNewsCategories()
    {
        DB::table('news_categories')->truncate();
        $categories = [
            [
                'id' => 1,
                'name' => 'Berita Perusahaan',
                'slug' => 'berita-perusahaan',
                'created_at' => '2025-05-15 05:32:24',
                'updated_at' => '2025-05-15 05:32:24',
            ],
            [
                'id' => 2,
                'name' => 'Pengumuman',
                'slug' => 'pengumuman',
                'created_at' => '2025-05-15 05:32:24',
                'updated_at' => '2025-05-15 05:32:24',
            ],
            [
                'id' => 3,
                'name' => 'Event',
                'slug' => 'event',
                'created_at' => '2025-05-15 05:32:24',
                'updated_at' => '2025-05-15 05:32:24',
            ],
            [
                'id' => 4,
                'name' => 'Karir',
                'slug' => 'karir',
                'created_at' => '2025-05-15 05:32:24',
                'updated_at' => '2025-05-15 05:32:24',
            ],
            [
                'id' => 5,
                'name' => 'CSR',
                'slug' => 'csr',
                'created_at' => '2025-05-15 05:32:24',
                'updated_at' => '2025-05-15 05:32:24',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('news_categories')->insert($category);
        }
    }

    private function seedNews()
    {
        DB::table('news')->truncate();
        DB::table('news_category')->truncate();
        
        $news = [
            [
                'id' => 1,
                'title' => 'SPBU 44.581.24 KALICERET',
                'slug' => 'spbu-4458124-kaliceret',
                'short_description' => 'SPBU 44.581.24 Kaliceret adalah salah satu unit bisnis PT Sidorejo Makmur Sejahtera yang menyediakan BBM berkualitas dan layanan prima untuk masyarakat.',
                'content' => '<p>PT SIDOREJO MAKMUR SEJAHTERA mengoperasikan SPBU 44.581.24 yang terletak di Kaliceret. SPBU ini menawarkan berbagai jenis bahan bakar Pertamina dengan kualitas terbaik dan pelayanan prima.</p><p>SPBU 44.581.24 Kaliceret dilengkapi dengan berbagai fasilitas penunjang seperti minimarket, ATM, mushola, toilet bersih, dan area istirahat yang nyaman bagi pengendara. Tim staf yang ramah dan profesional siap melayani kebutuhan pelanggan 24 jam sehari.</p><p>Sebagai bagian dari komitmen kami terhadap layanan berkualitas, SPBU ini secara rutin menjalani perawatan dan pemeliharaan untuk memastikan semua peralatan berfungsi dengan baik. Kami juga menerapkan standar keamanan yang ketat untuk memberikan rasa aman kepada pelanggan.</p>',
                'featured_image' => 'spbu-kaliceret.jpeg',
                'author' => 'Admin',
                'status' => 'published',
                'published_at' => '2025-05-10 05:32:24',
                'created_at' => '2025-05-15 05:32:24',
                'updated_at' => '2025-05-15 05:32:24',
            ],
            [
                'id' => 2,
                'title' => 'Kerjasama Penandatanganan MoU dengan Mitra Strategis',
                'slug' => 'kerjasama-penandatanganan-mou-dengan-mitra-strategis',
                'short_description' => 'PT Sidorejo Makmur Sejahtera menandatangani MoU dengan beberapa mitra strategis untuk ekspansi jaringan SPBU di Jawa Tengah.',
                'content' => '<p>PT SIDOREJO MAKMUR SEJAHTERA baru saja menandatangani nota kesepahaman (MoU) dengan beberapa mitra strategis untuk mengembangkan jaringan SPBU di Jawa Tengah.</p><p>Kerjasama ini merupakan bagian dari rencana ekspansi perusahaan untuk membuka lebih banyak SPBU di wilayah Jawa Tengah. Dengan adanya kerjasama ini, diharapkan dapat memperluas jangkauan layanan kami dan memberikan akses BBM yang lebih mudah bagi masyarakat.</p><p>Penandatanganan MoU ini dilakukan oleh Direktur Utama PT SIDOREJO MAKMUR SEJAHTERA dengan para perwakilan dari mitra strategis, disaksikan oleh pejabat terkait.</p>',
                'featured_image' => 'news/jabat-tangan.jpg',
                'author' => 'Tim Humas',
                'status' => 'published',
                'published_at' => '2025-05-13 05:32:24',
                'created_at' => '2025-05-15 05:32:24',
                'updated_at' => '2025-05-15 05:48:16',
            ],
            [
                'id' => 3,
                'title' => 'Program Rekrutmen Karyawan SPBU Baru',
                'slug' => 'program-rekrutmen-karyawan-spbu-baru',
                'short_description' => 'PT Sidorejo Makmur Sejahtera membuka lowongan kerja untuk posisi operator, kasir, dan supervisor di beberapa SPBU yang dikelola perusahaan.',
                'content' => '<p>PT SIDOREJO MAKMUR SEJAHTERA membuka kesempatan bagi putra-putri terbaik untuk bergabung di SPBU-SPBU yang dikelola oleh perusahaan. Saat ini, kami sedang melakukan rekrutmen untuk posisi operator, kasir, dan supervisor di beberapa SPBU kami.</p><p>Kami mencari kandidat yang memiliki motivasi tinggi, jujur, dan berorientasi pada pelayanan. Berkarir di PT SIDOREJO MAKMUR SEJAHTERA memberikan kesempatan untuk pertumbuhan karir dan pengembangan diri.</p><p>Bagi yang berminat, silakan kirimkan CV dan lamaran Anda ke email hrd@sidorejoms.co.id dengan subjek "Rekrutmen SPBU - [Nama Posisi]".</p>',
                'featured_image' => 'Rekrutmen.jpeg',
                'author' => 'HRD',
                'status' => 'published',
                'published_at' => '2025-05-05 05:32:24',
                'created_at' => '2025-05-15 05:32:24',
                'updated_at' => '2025-05-15 05:32:24',
            ],
        ];

        foreach ($news as $article) {
            DB::table('news')->insert($article);
        }

        // Insert news categories relationship
        $newsCategories = [
            ['news_id' => 1, 'news_category_id' => 1],
            ['news_id' => 1, 'news_category_id' => 5],
            ['news_id' => 2, 'news_category_id' => 2],
            ['news_id' => 2, 'news_category_id' => 3],
            ['news_id' => 2, 'news_category_id' => 5],
            ['news_id' => 3, 'news_category_id' => 2],
            ['news_id' => 3, 'news_category_id' => 4],
        ];

        foreach ($newsCategories as $relation) {
            DB::table('news_category')->insert($relation);
        }
    }

    private function seedSpbus()
    {
        DB::table('spbus')->truncate();
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
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:23:37',
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
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:59:46',
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
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:35:21',
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
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:49:54',
            ],
        ];

        foreach ($spbus as $spbu) {
            DB::table('spbus')->insert($spbu);
        }
    }

    private function seedTeams()
    {
        DB::table('teams')->truncate();
        $teams = [
            [
                'id' => 1,
                'spbu_id' => 1,
                'name' => 'Adi Setya W',
                'position' => 'Supervisor',
                'photo' => 'adi-setya-karangawenn.png',
                'order' => 1,
                'is_active' => 1,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 17:58:35',
            ],
            [
                'id' => 5,
                'spbu_id' => 3,
                'name' => 'Sigit Prasetyo',
                'position' => 'Kepala Operator',
                'photo' => 'sigit-bringin.png',
                'order' => 1,
                'is_active' => 1,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:46:58',
            ],
            [
                'id' => 6,
                'spbu_id' => 4,
                'name' => 'M.Jahuri',
                'position' => 'QQ&PENGAWAS',
                'photo' => 'jahuri.png',
                'order' => 1,
                'is_active' => 1,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:48:18',
            ],
            [
                'id' => 7,
                'spbu_id' => 4,
                'name' => 'Siswanto',
                'position' => 'KASIR',
                'photo' => 'siswanto.png',
                'order' => 2,
                'is_active' => 1,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:49:04',
            ],
            [
                'id' => 8,
                'spbu_id' => 3,
                'name' => 'Reva Arief',
                'position' => 'Staf QQ',
                'photo' => 'Reva-arief-bringin.png',
                'order' => 2,
                'is_active' => 1,
                'created_at' => '2025-05-20 18:36:38',
                'updated_at' => '2025-05-20 18:36:38',
            ],
        ];

        foreach ($teams as $team) {
            DB::table('teams')->insert($team);
        }
    }

    private function seedFacilities()
    {
        DB::table('facilities')->truncate();
        $facilities = [
            // SPBU Karangawen (ID: 1)
            [
                'id' => 1,
                'spbu_id' => 1,
                'name' => 'ALFAMART',
                'image' => 'alfamart_karanganwen.jpeg',
                'description' => 'Mini market untuk kebutuhan sehari-hari',
                'is_active' => 1,
                'order' => 1,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 18:08:27',
            ],
            [
                'id' => 2,
                'spbu_id' => 1,
                'name' => 'NITROGEN',
                'image' => 'nitrogen_karangawen.jpeg',
                'description' => 'Pengisian nitrogen untuk ban kendaraan',
                'is_active' => 1,
                'order' => 2,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 18:08:57',
            ],
            [
                'id' => 3,
                'spbu_id' => 1,
                'name' => 'AIR RADIATOR DAN ISI ANGIN BAN GRATIS',
                'image' => 'isi_angin_dan_air_radiator_gratis.jpeg',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'is_active' => 1,
                'order' => 3,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 18:09:49',
            ],
            [
                'id' => 4,
                'spbu_id' => 1,
                'name' => 'OLI',
                'image' => 'oli_karangawen.jpeg',
                'description' => 'Menjual berbagai merek oli kendaraan',
                'is_active' => 1,
                'order' => 4,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 18:47:19',
            ],
            [
                'id' => 5,
                'spbu_id' => 1,
                'name' => 'TOILET dan MUSHOLLA',
                'image' => 'toilet_dan_mushola.jpeg',
                'description' => 'Toilet bersih dan nyaman dan Tempat ibadah yang nyaman',
                'is_active' => 1,
                'order' => 5,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 18:49:45',
            ],
            [
                'id' => 6,
                'spbu_id' => 1,
                'name' => 'BRIGHT GAS',
                'image' => 'Gas.jpeg',
                'description' => 'Kami menyediakan tabung Bright Gas dengan Pilihan tabung 5.5 kg untuk kebutuhan pribadi atau 12 kg untuk kebutuhan keluarga.',
                'is_active' => 1,
                'order' => 6,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 18:51:59',
            ],
            
            // SPBU Bandungrejo (ID: 2)
            [
                'id' => 7,
                'spbu_id' => 2,
                'name' => 'ALFAMART',
                'image' => 'alfamart.jpeg',
                'description' => 'Mini market untuk kebutuhan sehari-hari',
                'is_active' => 1,
                'order' => 1,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 19:02:46',
            ],
            [
                'id' => 8,
                'spbu_id' => 2,
                'name' => 'ENDURO SERVICE',
                'image' => 'Enduro-service-bandung-rejo.jpeg',
                'description' => 'Pengisian nitrogen untuk ban kendaraan',
                'is_active' => 1,
                'order' => 2,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 19:03:25',
            ],
            [
                'id' => 9,
                'spbu_id' => 2,
                'name' => 'AIR dan ANGIN GRATIS',
                'image' => 'air.jpeg',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'is_active' => 1,
                'order' => 3,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 19:04:48',
            ],
            [
                'id' => 10,
                'spbu_id' => 2,
                'name' => 'OLI',
                'image' => 'oli.jpeg',
                'description' => 'Menjual berbagai merek oli kendaraan',
                'is_active' => 1,
                'order' => 4,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 19:05:33',
            ],
            [
                'id' => 11,
                'spbu_id' => 2,
                'name' => 'TOILET',
                'image' => 'toilet.jpeg',
                'description' => 'Toilet bersih dan nyaman',
                'is_active' => 1,
                'order' => 5,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 19:05:59',
            ],
            [
                'id' => 12,
                'spbu_id' => 2,
                'name' => 'MUSHOLLA',
                'image' => 'musholla.jpeg',
                'description' => 'Tempat ibadah yang nyaman',
                'is_active' => 1,
                'order' => 6,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 19:06:20',
            ],
            [
                'id' => 29,
                'spbu_id' => 2,
                'name' => 'MIE AYAM PLOMBOKAN',
                'image' => 'mie-ayam-plombokan.jpeg',
                'description' => 'Mie Ayam Mombokan, restoran dengan desain modern bergaya kontemporer yang menyajikan hidangan mie ayam khas. Fasad bangunan yang menarik dengan kombinasi warna krem dan merah dilengkapi logo bulat yang khas. Tersedia area parkir khusus untuk kenyamanan pengunjung dan ruangan ber-AC yang nyaman untuk menikmati hidangan. Lokasi strategis dan mudah diakses dengan interior yang bersih serta tampilan yang mengundang selera.',
                'is_active' => 1,
                'order' => 7,
                'created_at' => '2025-05-20 19:25:02',
                'updated_at' => '2025-05-20 19:25:02',
            ],
            
            // SPBU Bringin (ID: 3)
            [
                'id' => 13,
                'spbu_id' => 3,
                'name' => 'INDOMARET',
                'image' => 'indomaret-bringin.jpeg',
                'description' => 'Mini market untuk kebutuhan sehari-hari',
                'is_active' => 1,
                'order' => 1,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:37:23',
            ],
            [
                'id' => 14,
                'spbu_id' => 3,
                'name' => 'NITROGEN dan OLI',
                'image' => 'Nitrogen-dan-Oli-bringin.jpeg',
                'description' => 'Pengisian nitrogen untuk ban kendaraan dan bergam oli untuk kendaraan anda',
                'is_active' => 1,
                'order' => 2,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:38:10',
            ],
            [
                'id' => 15,
                'spbu_id' => 3,
                'name' => 'AIR dan ANGIN GRATIS',
                'image' => 'air-dan-angin-gratis-bringin.jpeg',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'is_active' => 1,
                'order' => 3,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:38:29',
            ],
            [
                'id' => 16,
                'spbu_id' => 3,
                'name' => 'ATM BRI',
                'image' => 'atm-bri-bringin.jpeg',
                'description' => 'Fasilitas ATM BRI tersedia untuk kemudahan bertransaksi perbankan seperti penarikan tunai, transfer, pembayaran, dan layanan perbankan lainnya selama 24 jam.',
                'is_active' => 1,
                'order' => 4,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:40:43',
            ],
            [
                'id' => 17,
                'spbu_id' => 3,
                'name' => 'TOILET',
                'image' => 'toilet-bringin.jpeg',
                'description' => 'Toilet bersih dan nyaman',
                'is_active' => 1,
                'order' => 5,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:38:52',
            ],
            [
                'id' => 18,
                'spbu_id' => 3,
                'name' => 'MUSHOLLA',
                'image' => 'Musholla-bringn.jpeg',
                'description' => 'Tempat ibadah yang nyaman',
                'is_active' => 1,
                'order' => 6,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-20 18:39:16',
            ],
            [
                'id' => 25,
                'spbu_id' => 3,
                'name' => 'Cocoruyuk',
                'image' => 'cocoruyuk.jpeg',
                'description' => 'Restoran cepat saji yang menyajikan menu ayam goreng krispi dan kopi dengan konsep modern. Tempat nyaman untuk berkumpul bersama keluarga dan teman dengan area parkir yang memadai.',
                'is_active' => 1,
                'order' => 7,
                'created_at' => '2025-05-20 18:43:42',
                'updated_at' => '2025-05-20 18:43:42',
            ],
            [
                'id' => 26,
                'spbu_id' => 3,
                'name' => 'Toko Kharisma',
                'image' => 'kharisma-bringin.jpeg',
                'description' => 'Toko perlengkapan sekolah dan mainan anak dengan berbagai pilihan alat tulis, tas, dompet, dan aksesoris. Melayani pembelian grosir maupun eceran untuk kebutuhan sehari-hari dan perlengkapan sekolah.',
                'is_active' => 1,
                'order' => 8,
                'created_at' => '2025-05-20 18:44:31',
                'updated_at' => '2025-05-20 18:44:31',
            ],
            [
                'id' => 27,
                'spbu_id' => 3,
                'name' => 'Kose Pharmacy',
                'image' => 'apotik-bringin.jpeg',
                'description' => 'Apotek lengkap yang menyediakan obat-obatan, vitamin, dan kebutuhan kesehatan dengan pelayanan profesional. Solusi kesehatan terpercaya dengan konsultasi farmasi dan layanan pengantaran',
                'is_active' => 1,
                'order' => 9,
                'created_at' => '2025-05-20 18:45:19',
                'updated_at' => '2025-05-20 18:45:19',
            ],
            [
                'id' => 28,
                'spbu_id' => 3,
                'name' => 'BRIGHT GAS',
                'image' => 'gas-elpiji-bringin.jpeg',
                'description' => 'Outlet resmi Bright Gas yang menyediakan tabung gas LPG ukuran 5,5 kg dalam kemasan hijau. Tersedia layanan antar dan penukaran tabung gas dengan jaminan keamanan dan keaslian produk',
                'is_active' => 1,
                'order' => 10,
                'created_at' => '2025-05-20 18:45:56',
                'updated_at' => '2025-05-20 18:45:56',
            ],
            
            // SPBU Kaliceret (ID: 4)
            [
                'id' => 19,
                'spbu_id' => 4,
                'name' => 'ALFAMART dan ATM BRI',
                'image' => 'alfamart-dan-atm-bri-kaliceret.jpeg',
                'description' => 'Mini market untuk kebutuhan sehari-hari dan atm bri',
                'is_active' => 1,
                'order' => 1,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:50:54',
            ],
            [
                'id' => 20,
                'spbu_id' => 4,
                'name' => 'NITROGEN',
                'image' => 'nitrogen-kaliceret.jpeg',
                'description' => 'Pengisian nitrogen untuk ban kendaraan',
                'is_active' => 1,
                'order' => 2,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:51:17',
            ],
            [
                'id' => 21,
                'spbu_id' => 4,
                'name' => 'AIR dan ANGIN Radiaotor GRATIS',
                'image' => 'air-dan-angin-kaliceret.jpeg',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'is_active' => 1,
                'order' => 3,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:58:30',
            ],
            [
                'id' => 22,
                'spbu_id' => 4,
                'name' => 'OLI',
                'image' => 'oli-kaliceret.jpeg',
                'description' => 'Menjual berbagai merek oli kendaraan',
                'is_active' => 1,
                'order' => 4,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:58:51',
            ],
            [
                'id' => 23,
                'spbu_id' => 4,
                'name' => 'TOILET',
                'image' => 'toilet-kaliceret.jpeg',
                'description' => 'Toilet bersih dan nyaman',
                'is_active' => 1,
                'order' => 5,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:59:32',
            ],
            [
                'id' => 24,
                'spbu_id' => 4,
                'name' => 'MUSHOLLA',
                'image' => 'musholla-kaliceret.jpeg',
                'description' => 'Tempat ibadah yang nyaman',
                'is_active' => 1,
                'order' => 6,
                'created_at' => '2025-05-17 01:03:55',
                'updated_at' => '2025-05-18 19:59:49',
            ],
        ];

        foreach ($facilities as $facility) {
            DB::table('facilities')->insert($facility);
        }
    }

    private function seedContacts()
    {
        DB::table('contacts')->truncate();
        $contacts = [
            [
                'id' => 1,
                'first_name' => 'ILHAM',
                'last_name' => 'PULUNGAN',
                'email' => 'argapulungan@gmail.com',
                'message' => 'Saya ingin mengetahui lebih lanjut tentang layanan SPBU Anda.',
                'created_at' => '2025-05-14 11:09:37',
                'updated_at' => '2025-05-14 11:09:37',
            ],
            [
                'id' => 2,
                'first_name' => 'Argana',
                'last_name' => 'Pulungan',
                'email' => 'arganapulungan@gmail.com',
                'message' => 'Mohon informasi mengenai rekrutmen karyawan SPBU.',
                'created_at' => '2025-05-14 22:35:47',
                'updated_at' => '2025-05-14 22:35:47',
            ],
            [
                'id' => 3,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'message' => 'Terima kasih atas pelayanan yang memuaskan di SPBU Kaliceret.',
                'created_at' => '2025-05-18 10:46:17',
                'updated_at' => '2025-05-18 10:46:17',
            ],
            [
                'id' => 4,
                'first_name' => 'Budi',
                'last_name' => 'Santoso',
                'email' => 'budi.santoso@example.com',
                'message' => 'Apakah ada program CSR yang bisa kami ikuti sebagai masyarakat sekitar?',
                'created_at' => '2025-05-20 08:30:15',
                'updated_at' => '2025-05-20 08:30:15',
            ],
            [
                'id' => 5,
                'first_name' => 'Sari',
                'last_name' => 'Dewi',
                'email' => 'sari.dewi@gmail.com',
                'message' => 'Pelayanan di SPBU Bringin sangat memuaskan. Fasilitas Alfamart dan ATM BRI sangat membantu.',
                'created_at' => '2025-05-21 14:45:22',
                'updated_at' => '2025-05-21 14:45:22',
            ],
        ];

        foreach ($contacts as $contact) {
            DB::table('contacts')->insert($contact);
        }
    }
}