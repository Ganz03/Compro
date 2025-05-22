<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisiMisi;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        VisiMisi::create([
            'visi' => 'Menjadi SPBU yang handal dan tangguh dengan memberikan pelayanan terbaik, memastikan kualitas yang dapat diandalkan, serta menciptakan nilai positif yang menjadikan kami terpercaya dan bernilai di mata masyarakat.',
            'misi' => 'Mempermudah masyarakat dalam pengisian BBM, memberikan pelayanan yang nyaman, membuka peluang kerja bagi lingkungan sekitar, menjaga kualitas pelayanan dengan mengedepankan slogan PASTI PAS, dan menunjukkan kepedulian terhadap masyarakat sekitar lingkungan SPBU.',
        ]);
    }
}
