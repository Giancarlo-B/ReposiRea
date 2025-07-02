<?php

namespace App\Filament\Resources\OrientacionVocacionalResource\Pages;

use App\Filament\Resources\OrientacionVocacionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrientacionVocacionals extends ListRecords
{
    protected static string $resource = OrientacionVocacionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
