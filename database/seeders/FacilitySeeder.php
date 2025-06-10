<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            // SPBU Karangawen
            [
                'spbu_id' => 1,
                'name' => 'ALFAMART',
                'image' => 'alfamart_karanganwen.jpeg',
                'description' => 'Mini market untuk kebutuhan sehari-hari',
                'order' => 1,
            ],
            [
                'spbu_id' => 1,
                'name' => 'NITROGEN',
                'image' => 'nitrogen_karangawen.jpeg',
                'description' => 'Pengisian nitrogen untuk ban kendaraan',
                'order' => 2,
            ],
            [
                'spbu_id' => 1,
                'name' => 'AIR RADIATOR DAN ISI ANGIN BAN GRATIS',
                'image' => 'isi_angin_dan_air_radiator_gratis.jpeg',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'order' => 3,
            ],
            [
                'spbu_id' => 1,
                'name' => 'OLI',
                'image' => 'oli_karangawen.jpeg',
                'description' => 'Menjual berbagai merek oli kendaraan',
                'order' => 4,
            ],
            [
                'spbu_id' => 1,
                'name' => 'TOILET dan MUSHOLLA',
                'image' => 'toilet_dan_mushola.jpeg',
                'description' => 'Toilet bersih dan nyaman dan Tempat ibadah yang nyaman',
                'order' => 5,
            ],
            [
                'spbu_id' => 1,
                'name' => 'BRIGHT GAS',
                'image' => 'Gas.jpeg',
                'description' => 'Kami menyediakan tabung Bright Gas dengan Pilihan tabung 5.5 kg untuk kebutuhan pribadi atau 12 kg untuk kebutuhan keluarga.',
                'order' => 6,
            ],
            // SPBU Bandungrejo
            [
                'spbu_id' => 2,
                'name' => 'ALFAMART',
                'image' => 'alfamart.jpeg',
                'description' => 'Mini market untuk kebutuhan sehari-hari',
                'order' => 1,
            ],
            [
                'spbu_id' => 2,
                'name' => 'ENDURO SERVICE',
                'image' => 'Enduro-service-bandung-rejo.jpeg',
                'description' => 'Pengisian nitrogen untuk ban kendaraan',
                'order' => 2,
            ],
            [
                'spbu_id' => 2,
                'name' => 'AIR dan ANGIN GRATIS',
                'image' => 'air.jpeg',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'order' => 3,
            ],
            [
                'spbu_id' => 2,
                'name' => 'OLI',
                'image' => 'oli.jpeg',
                'description' => 'Menjual berbagai merek oli kendaraan',
                'order' => 4,
            ],
            [
                'spbu_id' => 2,
                'name' => 'TOILET',
                'image' => 'toilet.jpeg',
                'description' => 'Toilet bersih dan nyaman',
                'order' => 5,
            ],
            [
                'spbu_id' => 2,
                'name' => 'MUSHOLLA',
                'image' => 'musholla.jpeg',
                'description' => 'Tempat ibadah yang nyaman',
                'order' => 6,
            ],
            [
                'spbu_id' => 2,
                'name' => 'MIE AYAM PLOMBOKAN',
                'image' => 'mie-ayam-plombokan.jpeg',
                'description' => 'Mie Ayam Mombokan, restoran dengan desain modern bergaya kontemporer yang menyajikan hidangan mie ayam khas. Fasad bangunan yang menarik dengan kombinasi warna krem dan merah dilengkapi logo bulat yang khas.',
                'order' => 7,
            ],
            // SPBU Bringin
            [
                'spbu_id' => 3,
                'name' => 'INDOMARET',
                'image' => 'indomaret-bringin.jpeg',
                'description' => 'Mini market untuk kebutuhan sehari-hari',
                'order' => 1,
            ],
            [
                'spbu_id' => 3,
                'name' => 'NITROGEN dan OLI',
                'image' => 'Nitrogen-dan-Oli-bringin.jpeg',
                'description' => 'Pengisian nitrogen untuk ban kendaraan dan bergam oli untuk kendaraan anda',
                'order' => 2,
            ],
            [
                'spbu_id' => 3,
                'name' => 'AIR dan ANGIN GRATIS',
                'image' => 'air-dan-angin-gratis-bringin.jpeg',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'order' => 3,
            ],
            [
                'spbu_id' => 3,
                'name' => 'ATM BRI',
                'image' => 'atm-bri-bringin.jpeg',
                'description' => 'Fasilitas ATM BRI tersedia untuk kemudahan bertransaksi perbankan seperti penarikan tunai, transfer, pembayaran, dan layanan perbankan lainnya selama 24 jam.',
                'order' => 4,
            ],
            [
                'spbu_id' => 3,
                'name' => 'TOILET',
                'image' => 'toilet-bringin.jpeg',
                'description' => 'Toilet bersih dan nyaman',
                'order' => 5,
            ],
            [
                'spbu_id' => 3,
                'name' => 'MUSHOLLA',
                'image' => 'Musholla-bringn.jpeg',
                'description' => 'Tempat ibadah yang nyaman',
                'order' => 6,
            ],
            [
                'spbu_id' => 3,
                'name' => 'Cocoruyuk',
                'image' => 'cocoruyuk.jpeg',
                'description' => 'Restoran cepat saji yang menyajikan menu ayam goreng krispi dan kopi dengan konsep modern. Tempat nyaman untuk berkumpul bersama keluarga dan teman dengan area parkir yang memadai.',
                'order' => 7,
            ],
            [
                'spbu_id' => 3,
                'name' => 'Toko Kharisma',
                'image' => 'kharisma-bringin.jpeg',
                'description' => 'Toko perlengkapan sekolah dan mainan anak dengan berbagai pilihan alat tulis, tas, dompet, dan aksesoris. Melayani pembelian grosir maupun eceran untuk kebutuhan sehari-hari dan perlengkapan sekolah.',
                'order' => 8,
            ],
            [
                'spbu_id' => 3,
                'name' => 'Kose Pharmacy',
                'image' => 'apotik-bringin.jpeg',
                'description' => 'Apotek lengkap yang menyediakan obat-obatan, vitamin, dan kebutuhan kesehatan dengan pelayanan profesional. Solusi kesehatan terpercaya dengan konsultasi farmasi dan layanan pengantaran',
                'order' => 9,
            ],
            [
                'spbu_id' => 3,
                'name' => 'BRIGHT GAS',
                'image' => 'gas-elpiji-bringin.jpeg',
                'description' => 'Outlet resmi Bright Gas yang menyediakan tabung gas LPG ukuran 5,5 kg dalam kemasan hijau. Tersedia layanan antar dan penukaran tabung gas dengan jaminan keamanan dan keaslian produk',
                'order' => 10,
            ],
            // SPBU Kaliceret
            [
                'spbu_id' => 4,
                'name' => 'ALFAMART dan ATM BRI',
                'image' => 'alfamart-dan-atm-bri-kaliceret.jpeg',
                'description' => 'Mini market untuk kebutuhan sehari-hari dan atm bri',
                'order' => 1,
            ],
            [
                'spbu_id' => 4,
                'name' => 'NITROGEN',
                'image' => 'nitrogen-kaliceret.jpeg',
                'description' => 'Pengisian nitrogen untuk ban kendaraan',
                'order' => 2,
            ],
            [
                'spbu_id' => 4,
                'name' => 'AIR dan ANGIN Radiaotor GRATIS',
                'image' => 'air-dan-angin-kaliceret.jpeg',
                'description' => 'Fasilitas pengisian air radiator dan tekanan ban secara gratis',
                'order' => 3,
            ],
            [
                'spbu_id' => 4,
                'name' => 'OLI',
                'image' => 'oli-kaliceret.jpeg',
                'description' => 'Menjual berbagai merek oli kendaraan',
                'order' => 4,
            ],
            [
                'spbu_id' => 4,
                'name' => 'TOILET',
                'image' => 'toilet-kaliceret.jpeg',
                'description' => 'Toilet bersih dan nyaman',
                'order' => 5,
            ],
            [
                'spbu_id' => 4,
                'name' => 'MUSHOLLA',
                'image' => 'musholla-kaliceret.jpeg',
                'description' => 'Tempat ibadah yang nyaman',
                'order' => 6,
            ],
        ];

        foreach ($facilities as $facility) {
            $facility['is_active'] = 1;
            $facility['created_at'] = now();
            $facility['updated_at'] = now();
            DB::table('facilities')->insert($facility);
        }
    }
}