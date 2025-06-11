<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Berita Perusahaan',
                'slug' => 'berita-perusahaan',
            ],
            [
                'id' => 2,
                'name' => 'Pengumuman',
                'slug' => 'pengumuman',
            ],
            [
                'id' => 3,
                'name' => 'Event',
                'slug' => 'event',
            ],
            [
                'id' => 4,
                'name' => 'Karir',
                'slug' => 'karir',
            ],
            [
                'id' => 5,
                'name' => 'CSR',
                'slug' => 'csr',
            ],
        ];

        foreach ($categories as $category) {
            $category['created_at'] = now();
            $category['updated_at'] = now();
            DB::table('news_categories')->insert($category);
        }
    }
}
