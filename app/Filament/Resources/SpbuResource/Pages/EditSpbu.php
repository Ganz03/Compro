<?php

namespace App\Filament\Resources\SpbuResource\Pages;

use App\Filament\Resources\SpbuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditSpbu extends EditRecord
{
    protected static string $resource = SpbuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        // Validasi data sebelum menyimpan perubahan
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
        ];

        // Periksa apakah ada field required yang kosong
        foreach ($requiredFields as $field => $label) {
            if (empty($data[$field])) {
                $missingFields[] = $label;
            }
        }

        // Untuk gambar, periksa jika sudah ada atau baru diupload
        if (empty($data['hero_image']) && empty($this->record->hero_image)) {
            $missingFields[] = 'Gambar Hero';
        }
        
        if (empty($data['thumbnail_image']) && empty($this->record->thumbnail_image)) {
            $missingFields[] = 'Gambar Thumbnail';
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

    protected function afterSave(): void
    {
        // Tampilkan notifikasi sukses setelah berhasil disimpan
        Notification::make()
            ->title('SPBU berhasil diperbarui')
            ->success()
            ->send();
    }
}