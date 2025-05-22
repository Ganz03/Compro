<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationLabel = 'Mitra Kami';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    // Menonaktifkan create dan delete jika perlu, tetapi kita ingin mengaktifkan keduanya
    public static function canCreate(): bool
    {
        return true; // Izinkan membuat mitra baru
    }

    public static function canDelete($record): bool
    {
        return true; // Izinkan menghapus mitra
    }

    public static function canEdit($record): bool
    {
        return true; // Izinkan mengedit mitra
    }

    // Membuat form untuk menambah/edit mitra
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Mitra')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Mitra')
                    ->disk('partner')
                    ->image()
                    ->preserveFilenames()
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->label('URL Mitra')
                    ->url()
                    ->nullable(),
            ]);
    }

    // Menampilkan data mitra dalam tabel
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Mitra')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('partner')
                    ->square()
                    ->width(50)
                    ->height(50)
                    ->getStateUsing(function ($record) {
                    return asset('images/partner/' . $record->image); // Memastikan path gambar benar
                    }),
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->url('url')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Pastikan aksi Delete diaktifkan
            ])
            ->bulkActions([
                // Tambahkan aksi bulk jika perlu
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPartners::route('/'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
            'create' => Pages\CreatePartner::route('/create'),  // Menambahkan halaman Create Partner
        ];
    }
}