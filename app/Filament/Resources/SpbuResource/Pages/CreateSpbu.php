<?php

namespace App\Filament\Resources\SpbuResource\Pages;

use App\Filament\Resources\SpbuResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

class CreateSpbu extends CreateRecord
{
    protected static string $resource = SpbuResource::class;

    protected function beforeCreate(): void
    {
        // Validasi data sebelum menyimpan
        $data = $this->form->getState();
        $missingFields = [];

        // List semua field yang required
        $requiredFields = [
            'code' => 'Kode SPBU',
            'name' => 'Nama SPBU',
            'slug' => 'Slug',
            'description' => 'Deskripsi',
            'established_year' => 'Tahun Pendirian',
            'address' => 'Alamat',
            'city' => 'Kota',
            'province' => 'Provinsi',
            'postal_code' => 'Kode Pos',
            'phone' => 'Telepon',
            'email' => 'Email',
            'google_maps_embed' => 'Google Maps Embed',
            'hero_image' => 'Gambar Hero',
            'thumbnail_image' => 'Gambar Thumbnail',
        ];

        // Periksa apakah ada field required yang kosong
        foreach ($requiredFields as $field => $label) {
            if (empty($data[$field])) {
                $missingFields[] = $label;
            }
        }

        // Jika ada field yang kosong, tampilkan peringatan
        if (!empty($missingFields)) {
            $this->halt();
            
            Notification::make()
                ->title('Data tidak lengkap!')
                ->body('Field berikut harus diisi: ' . implode(', ', $missingFields))
                ->danger()
                ->send();
        }
    }

    protected function afterCreate(): void
    {
        // Tampilkan notifikasi sukses setelah berhasil dibuat
        Notification::make()
            ->title('SPBU berhasil dibuat')
            ->success()
            ->send();
    }
}