<?php

namespace App\Filament\Resources\AboutUsDetailResource\Pages;

use App\Filament\Resources\AboutUsDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutUsDetails extends ListRecords
{
    protected static string $resource = AboutUsDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
