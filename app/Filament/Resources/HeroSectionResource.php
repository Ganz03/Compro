<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSectionResource\Pages;
use App\Models\HeroSection;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class HeroSectionResource extends Resource
{
    protected static ?string $model = HeroSection::class;

    // Menentukan nama untuk resource di Filament
    protected static ?string $navigationLabel = 'Hero Section';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $navigationIcon = 'heroicon-o-star';
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

    // Form untuk mengedit Hero Section
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('background_image')
                ->image()
                ->nullable()
                ->label('Background Image')
                ->helperText('Upload image untuk background')
                ->disk('hero_disk') // Gunakan disk custom
                ->preserveFilenames(), // Pertahankan nama file asli

            Forms\Components\TextInput::make('typed_line_1')
                ->required()
                ->maxLength(255)
                ->label('Typed Line 1')
                ->placeholder('Enter the first line of the text'),

            Forms\Components\TextInput::make('typed_line_2')
                ->required()
                ->maxLength(255)
                ->label('Typed Line 2')
                ->placeholder('Enter the second line of the text'),

            Forms\Components\Textarea::make('description')
                ->nullable()
                ->maxLength(500)
                ->label('Description')
                ->placeholder('Enter the description text'),
        ]);
    }

    // Menampilkan data Hero Section di tabel Filament
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('typed_line_1')
                ->sortable()
                ->searchable()
                ->label('Line 1'),
            
            Tables\Columns\TextColumn::make('typed_line_2')
                ->sortable()
                ->searchable()
                ->label('Line 2'),
            Tables\Columns\ImageColumn::make('background_image')
                ->label('background_image')
                ->disk('hero')
                ->square()
                ->width(50)
                ->height(50)
                ->getStateUsing(function ($record) {
                return asset('images/hero_section/' . $record->background_image); // Memastikan path gambar benar
                }),
        ])
        ->filters([
            // Filter can be added here if necessary
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([]);
    } 

    // Halaman resource: Menentukan halaman untuk CRUD
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHeroSections::route('/'),
            'edit' => Pages\EditHeroSection::route('/{record}/edit'),
        ];
    }
}
