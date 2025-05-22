<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpbuResource\Pages;
use App\Filament\Resources\SpbuResource\RelationManagers;
use App\Models\Spbu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use Filament\Notifications\Notification;

class SpbuResource extends Resource
{
    protected static ?string $model = Spbu::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationGroup = 'SPBU';
    
    protected static ?string $navigationLabel = 'SPBU Locations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->schema([
                                Forms\Components\TextInput::make('code')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->placeholder('e.g. 44.581.24'),
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g. Kaliceret')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($set, $state) {
                                        $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),
                                Forms\Components\Textarea::make('description')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('established_year')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1990)
                                    ->maxValue(date('Y')),
                                Forms\Components\Toggle::make('is_active')
                                    ->required()
                                    ->default(true),
                            ]),
                        Forms\Components\Tabs\Tab::make('Contact & Location')
                            ->schema([
                                Forms\Components\Textarea::make('address')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('city')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('province')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('postal_code')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->required() 
                                    ->tel()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('google_maps_embed')
                                    ->required()
                                    ->helperText('Paste the src URL from Google Maps iframe embed code')
                                    ->columnSpanFull(),
                            ]),
                        Forms\Components\Tabs\Tab::make('Images')
                            ->schema([
                                Forms\Components\FileUpload::make('hero_image')
                                    ->label('hero_image')
                                    ->disk('spbu')
                                    ->image()
                                    ->required()
                                    ->preserveFilenames(),
                                Forms\Components\FileUpload::make('thumbnail_image')
                                    ->label('thumbnail_image')
                                    ->disk('spbu')
                                    ->image()
                                    ->required()
                                    ->preserveFilenames(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('hero_image')
                    ->label('Hero Image')
                    ->square()
                    ->disk('spbu')
                    ->width(50)
                    ->height(50)
                    ->getStateUsing(function ($record) {
                        return asset('images/spbu/' . $record->hero_image);
                    }),
                Tables\Columns\ImageColumn::make('thumbnail_image')
                    ->label('Gambar')
                    ->disk('spbu')
                    ->square()
                    ->width(50)
                    ->height(50)
                    ->getStateUsing(function ($record) {
                    return asset('images/spbu/' . $record->thumbnail_image); // Memastikan path gambar benar
                    }),
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('province')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('established_year')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('province')
                    ->options(fn () => Spbu::distinct()->pluck('province', 'province')->toArray())
                    ->label('Filter by Province'),
                Tables\Filters\SelectFilter::make('city')
                    ->options(fn () => Spbu::distinct()->pluck('city', 'city')->toArray())
                    ->label('Filter by City'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activateSelected')
                        ->label('Activate Selected')
                        ->icon('heroicon-o-check-circle')
                        ->action(fn (Collection $records) => $records->each->update(['is_active' => true]))
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('deactivateSelected')
                        ->label('Deactivate Selected')
                        ->icon('heroicon-o-x-circle')
                        ->action(fn (Collection $records) => $records->each->update(['is_active' => false]))
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('name', 'asc');
    }

    public static function getRelations(): array
    {
        return [
            // Replace these with your relation manager classes
            RelationManagers\TeamsRelationManager::class,
            RelationManagers\FacilitiesRelationManager::class,
        ];
    }

    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpbus::route('/'),
            'create' => Pages\CreateSpbu::route('/create'),
            'view' => Pages\ViewSpbu::route('/{record}'),
            'edit' => Pages\EditSpbu::route('/{record}/edit'),
        ];
    }
}