<?php

namespace App\Filament\Resources\LlamadaOrientacionResource\Pages;

use App\Filament\Resources\LlamadaOrientacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLlamadaOrientacions extends ListRecords
{
    protected static string $resource = LlamadaOrientacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
