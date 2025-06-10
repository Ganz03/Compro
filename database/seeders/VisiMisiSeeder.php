<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisiMisiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('visi_misi')->insert([
            'id' => 1,
            'visi' => 'Menjadi SPBU yang handal dan tangguh dengan memberikan pelayanan terbaik, memastikan kualitas yang dapat diandalkan, serta menciptakan nilai positif yang menjadikan kami terpercaya dan bernilai di mata masyarakat.',
            'misi' => 'Mempermudah masyarakat dalam pengisian BBM, memberikan pelayanan yang nyaman, membuka peluang kerja bagi lingkungan sekitar, menjaga kualitas pelayanan dengan mengedepankan slogan PASTI PAS, dan menunjukkan kepedulian terhadap masyarakat sekitar lingkungan SPBU.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}