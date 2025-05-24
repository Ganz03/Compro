<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa kategori
        $categories = [
            'Berita Perusahaan' => 'berita-perusahaan',
            'Pengumuman' => 'pengumuman',
            'Event' => 'event',
            'Karir' => 'karir',
            'CSR' => 'csr',
        ];

        $categoryIds = [];
        foreach ($categories as $name => $slug) {
            $category = NewsCategory::create([
                'name' => $name,
                'slug' => $slug,
            ]);
            $categoryIds[] = $category->id;
        }

        // Buat beberapa berita contoh
        $news = [
            [
                'title' => 'SPBU 44.581.24 KALICERET',
                'content' => '<p>PT SIDOREJO MAKMUR SEJAHTERA mengoperasikan SPBU 44.581.24 yang terletak di Kaliceret. SPBU ini menawarkan berbagai jenis bahan bakar Pertamina dengan kualitas terbaik dan pelayanan prima.</p><p>SPBU 44.581.24 Kaliceret dilengkapi dengan berbagai fasilitas penunjang seperti minimarket, ATM, mushola, toilet bersih, dan area istirahat yang nyaman bagi pengendara. Tim staf yang ramah dan profesional siap melayani kebutuhan pelanggan 24 jam sehari.</p><p>Sebagai bagian dari komitmen kami terhadap layanan berkualitas, SPBU ini secara rutin menjalani perawatan dan pemeliharaan untuk memastikan semua peralatan berfungsi dengan baik. Kami juga menerapkan standar keamanan yang ketat untuk memberikan rasa aman kepada pelanggan.</p>',
                'short_description' => 'SPBU 44.581.24 Kaliceret adalah salah satu unit bisnis PT Sidorejo Makmur Sejahtera yang menyediakan BBM berkualitas dan layanan prima untuk masyarakat.',
                'status' => 'published',
                'author' => 'Admin',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Kerjasama Penandatanganan MoU dengan Mitra Strategis',
                'content' => '<p>PT SIDOREJO MAKMUR SEJAHTERA baru saja menandatangani nota kesepahaman (MoU) dengan beberapa mitra strategis untuk mengembangkan jaringan SPBU di Jawa Tengah.</p><p>Kerjasama ini merupakan bagian dari rencana ekspansi perusahaan untuk membuka lebih banyak SPBU di wilayah Jawa Tengah. Dengan adanya kerjasama ini, diharapkan dapat memperluas jangkauan layanan kami dan memberikan akses BBM yang lebih mudah bagi masyarakat.</p><p>Penandatanganan MoU ini dilakukan oleh Direktur Utama PT SIDOREJO MAKMUR SEJAHTERA dengan para perwakilan dari mitra strategis, disaksikan oleh pejabat terkait.</p>',
                'short_description' => 'PT Sidorejo Makmur Sejahtera menandatangani MoU dengan beberapa mitra strategis untuk ekspansi jaringan SPBU di Jawa Tengah.',
                'status' => 'published',
                'author' => 'Tim Humas',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Program Rekrutmen Karyawan SPBU Baru',
                'content' => '<p>PT SIDOREJO MAKMUR SEJAHTERA membuka kesempatan bagi putra-putri terbaik untuk bergabung di SPBU-SPBU yang dikelola oleh perusahaan. Saat ini, kami sedang melakukan rekrutmen untuk posisi operator, kasir, dan supervisor di beberapa SPBU kami.</p><p>Kami mencari kandidat yang memiliki motivasi tinggi, jujur, dan berorientasi pada pelayanan. Berkarir di PT SIDOREJO MAKMUR SEJAHTERA memberikan kesempatan untuk pertumbuhan karir dan pengembangan diri.</p><p>Bagi yang berminat, silakan kirimkan CV dan lamaran Anda ke email hrd@sidorejoms.co.id dengan subjek "Rekrutmen SPBU - [Nama Posisi]".</p>',
                'short_description' => 'PT Sidorejo Makmur Sejahtera membuka lowongan kerja untuk posisi operator, kasir, dan supervisor di beberapa SPBU yang dikelola perusahaan.',
                'status' => 'published',
                'author' => 'HRD',
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($news as $item) {
            $newsItem = News::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'content' => $item['content'],
                'short_description' => $item['short_description'],
                'status' => $item['status'],
                'author' => $item['author'],
                'published_at' => $item['published_at'],
            ]);
            
            // Attach random categories (1-3) to each news
            $randomCategoryCount = rand(1, 3);
            $randomCategoryIds = collect($categoryIds)->random($randomCategoryCount)->toArray();
            $newsItem->categories()->attach($randomCategoryIds);
        }
    }
}