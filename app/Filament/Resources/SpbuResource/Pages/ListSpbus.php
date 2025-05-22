<?php

namespace App\Filament\Resources\SpbuResource\Pages;

use App\Filament\Resources\SpbuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpbus extends ListRecords
{
    protected static string $resource = SpbuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
