<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerResource\Pages;
use App\Models\Career;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class CareerResource extends Resource
{
    protected static ?string $model = Career::class;

    protected static ?string $navigationLabel = 'Career';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function canCreate(): bool
    {
        return true; // Izinkan membuat career baru
    }

    public static function canDelete($record): bool
    {
        return true; // Izinkan menghapus career
    }

    public static function canEdit($record): bool
    {
        return true; // Izinkan mengedit career
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description')  // Kolom untuk deskripsi
                    ->label('Deskripsi Karir')
                    ->required()
                    ->rows(5) // Membuat textarea dengan tinggi yang lebih besar
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi Karir')
                    ->limit(50), // Menampilkan preview deskripsi dengan batasan panjang
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime(),
            ])
            ->filters([ /* Filter jika diperlukan */ ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Aksi Delete
            ])
            ->bulkActions([ /* Aksi bulk jika perlu */ ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCareers::route('/'),
            'edit' => Pages\EditCareer::route('/{record}/edit'),
            'create' => Pages\CreateCareer::route('/create'),  // Menambahkan halaman Create Career
        ];
    }
}
