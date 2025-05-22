<?php


namespace App\Filament\Resources;

use App\Filament\Resources\AboutUsDetailResource\Pages;
use App\Models\AboutUsDetail;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class AboutUsDetailResource extends Resource
{
    protected static ?string $model = AboutUsDetail::class;

    protected static ?string $navigationLabel = 'About Us Detail';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $navigationParentGroup = 'About us';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function canCreate(): bool
    {
        return true; // Izinkan membuat About Us Detail
    }

    public static function canDelete($record): bool
    {
        return true; // Izinkan menghapus About Us Detail
    }

    public static function canEdit($record): bool
    {
        return true; // Izinkan mengedit About Us Detail
    }

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
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar')
                    ->disk('aboutus')
                    ->nullable()
                    ->image() // Menandakan hanya gambar yang diterima
                    ->preserveFilenames()
                    ->helperText('Gambar hanya dapat diubah, tidak bisa dihapus'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('company_description'),
                Tables\Columns\ImageColumn::make('image')  // Menampilkan gambar secara langsung
                    ->disk('aboutus')
                    ->label('Gambar')
                    ->square() // Gambar ditampilkan dalam bentuk kotak
                    ->width(50)
                    ->height(50)
                    ->getStateUsing(function ($record) {
                        return asset('/images/aboutus/' . $record->image); // Menyesuaikan path gambar
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutUsDetails::route('/'),
            'edit' => Pages\EditAboutUsDetail::route('/{record}/edit'),
            'create' => Pages\CreateAboutUsDetail::route('/create'),
        ];
    }
}
