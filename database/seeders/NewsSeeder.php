<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
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
            ],
            [
                'id' => 3,
                'title' => 'Program Rekrutmen Karyawan SPBU Baru',
                'slug' => 'program-rekrutmen-karyawan-spbu-baru',
                'short_description' => 'PT Sidorejo Makmur Sejahtera membuka lowongan kerja untuk posisi operator, kasir, dan supervisor di beberapa SPBU yang dikelola perusahaan.',
                'content' => '<p>PT SIDOREJO MAKMUR SEJAHTERA membuka kesempatan bagi putra-putri terbaik untuk bergabung di SPBU-SPBU yang dikelola oleh perusahaan. Saat ini, kami sedang melakukan rekrutmen untuk posisi operator, kasir, dan supervisor di beberapa SPBU kami.</p><p>Kami mencari kandidat yang memiliki motivasi tinggi, jujur, dan berorientasi pada pelayanan. Berkarir di PT SIDOREJO MAKMUR SEJAHTERA memberikan kesempatan untuk pertumbuhan karir dan pengembangan diri.</p><p>Bagi yang berminat, silakan kirimkan CV dan lamaran Anda ke email hrd@sidorejoms.co.id dengan subjek \"Rekrutmen SPBU - [Nama Posisi]\".</p>',
                'featured_image' => 'Rekrutmen.jpeg',
                'author' => 'HRD',
                'status' => 'published',
                'published_at' => '2025-05-05 05:32:24',
            ],
        ];

        foreach ($news as $newsItem) {
            $newsItem['created_at'] = now();
            $newsItem['updated_at'] = now();
            DB::table('news')->insert($newsItem);
        }

        // Insert news categories relationships
        $newsCategories = [
            ['news_id' => 1, 'news_category_id' => 1],
            ['news_id' => 1, 'news_category_id' => 5],
            ['news_id' => 2, 'news_category_id' => 2],
            ['news_id' => 2, 'news_category_id' => 3],
            ['news_id' => 2, 'news_category_id' => 5],
            ['news_id' => 3, 'news_category_id' => 2],
            ['news_id' => 3, 'news_category_id' => 4],
        ];

        foreach ($newsCategories as $newsCategory) {
            DB::table('news_category')->insert($newsCategory);
        }
    }
}