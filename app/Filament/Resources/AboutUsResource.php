<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsResource\Pages;
use App\Filament\Resources\AboutUsResource\RelationManagers;
use App\Models\AboutUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;

    // Menentukan nama untuk resource di Filament
    protected static ?string $navigationLabel = 'About us';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $navigationParentGroup = 'About us';

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
                Forms\Components\TextInput::make('company_name')
                    ->label('Nama Perusahaan')
                    ->required(),
                Forms\Components\Textarea::make('company_description')
                    ->label('Deskripsi Perusahaan')
                    ->required(),
                Forms\Components\FileUpload::make('image_name')
                    ->label('Gambar')
                    ->disk('aboutus')
                    ->nullable()
                    ->image()
                    ->preserveFilenames()
                    ->helperText('Gambar hanya dapat diubah, tidak bisa dihapus'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('company_description')->limit(50),
                Tables\Columns\ImageColumn::make('image_name')
                ->label('image')
                ->disk('aboutus')
                ->square()
                ->width(50)
                ->height(50)
                ->getStateUsing(function ($record) {
                return asset('images/aboutus/' . $record->image_name); // Memastikan path gambar benar
                }),
            ])
            ->filters([
                //
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
            'index' => Pages\ListAboutUs::route('/'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}
