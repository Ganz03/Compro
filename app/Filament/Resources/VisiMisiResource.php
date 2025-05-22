<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisiMisiResource\Pages;
use App\Models\VisiMisi;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use App\Filament\Resources\VisionMissionResource\Pages\ListVisiMisi;
use App\Filament\Resources\VisionMissionResource\Pages\EditVisiMisi;


class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;

    protected static ?string $navigationLabel = 'Visi & Misi';
    protected static ?string $navigationGroup = 'Landing Page';
     // Menghapus opsi create dan delete
    public static function canCreate(): bool
    {
        return false; // Tidak bisa membuat Hero Section baru
    }

    public static function canDelete($record): bool
    {
        return false; // Disable deletion for all records
    }

    public static function canEdit($record): bool
    {
        return true; // Allow editing for all records
    }

    protected static ?string $navigationIcon = 'heroicon-s-document-text';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('visi')
                    ->label('Visi')
                    ->required(),
                Forms\Components\Textarea::make('misi')
                    ->label('Misi')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visi')->limit(50),
                Tables\Columns\TextColumn::make('misi')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->date(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisiMisi::route('/'),
            'edit' => Pages\EditVisiMisi::route('/{record}/edit'),
        ];
    }
}

