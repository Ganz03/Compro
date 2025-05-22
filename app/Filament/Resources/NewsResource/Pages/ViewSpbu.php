<?php
// app/Filament/Resources/SpbuResource/Pages/ViewSpbu.php
namespace App\Filament\Resources\SpbuResource\Pages;

use App\Filament\Resources\SpbuResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSpbu extends ViewRecord
{
    protected static string $resource = SpbuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}