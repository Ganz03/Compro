<?php

namespace Database\Seeders;

use App\Models\AboutUsDetail;
use Illuminate\Database\Seeder;

class AboutUsDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUsDetail::create([
            'company_name' =>'PT SIDOREJO MAKMUR SEJAHTERA',
            'company_description' => 'PT Sidorejo Makmur Sejahtera merupakan perusahaan yang bergerak di bidang migas dan retail, dengan komitmen untuk menyediakan layanan energi dan kebutuhan sehari-hari yang berkualitas bagi masyarakat.
                Sejak awal berdirinya, perusahaan terus memperluas jaringan usahanya, khususnya melalui pengelolaan Stasiun Pengisian Bahan Bakar Umum (SPBU) yang tersebar di berbagai wilayah strategis.
                Cabang pertama yang didirikan adalah SPBU 44.595.13 Karangawen pada tahun 2007. SPBU ini menjadi fondasi awal kegiatan operasional perusahaan dan hingga saat ini masih aktif melayani masyarakat sekitar dengan layanan yang andal.
                Kemudian, pada tahun 2013, perusahaan membuka SPBU 44.595.18 Bandungrejo sebagai bentuk ekspansi untuk menjangkau lebih banyak pelanggan di wilayah berbeda.
                Perkembangan berlanjut dengan berdirinya SPBU 44.581.24 Kaliceret pada tahun 2017. Kehadiran SPBU ini memperkuat posisi perusahaan dalam industri migas, khususnya dalam hal distribusi bahan bakar yang mudah diakses dan terpercaya.
                Terakhir, pada tahun 2021, PT Sidorejo Makmur Sejahtera mendirikan SPBU 44.507.19 yang berlokasi di Bringin sebagai cabang keempat, memperluas cakupan layanan dan menegaskan komitmen perusahaan terhadap pertumbuhan berkelanjutan.',
            'image' => 'logo.png', // Add your image here or keep it dynamic as needed.
        ]);
    }
}

