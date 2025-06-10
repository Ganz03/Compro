<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('careers')->insert([
            'id' => 1,
            'description' => '1. Operator SPBU
Deskripsi Pekerjaan:

Melayani pengisian bahan bakar kendaraan

Menjaga kebersihan area SPBU

Memberikan pelayanan dengan ramah dan profesional

Kualifikasi:

Pria/Wanita, usia 18–30 tahun

Pendidikan minimal SMA/sederajat

Sehat jasmani dan rohani

Jujur, disiplin, dan bertanggung jawab

Bersedia bekerja dalam sistem shift

2. Kasir SPBU
Deskripsi Pekerjaan:

Melayani transaksi pembayaran dari pelanggan

Menyusun laporan transaksi harian

Bertanggung jawab terhadap uang kas

Kualifikasi:

Wanita, usia maksimal 30 tahun

Pendidikan minimal SMA/sederajat

Mampu mengoperasikan mesin kasir

Teliti dan memiliki integritas tinggi

3. Petugas Kebersihan & Keamanan
Deskripsi Pekerjaan:

Menjaga kebersihan area SPBU

Melakukan pemeriksaan keamanan area kerja secara rutin

Kualifikasi:

Pria, usia maksimal 35 tahun

Pendidikan minimal SMP/sederajat

Disiplin dan memiliki loyalitas kerja tinggi

📩 Cara Melamar:
Silakan kirimkan CV, surat lamaran, dan fotokopi KTP ke email:
📧 sidorejomakmursejahtera@gmail.com
Subjek: Lamaran_Posisi_Nama Lengkap
Contoh: Lamaran_OperatorSPBU_AhmadYusuf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}