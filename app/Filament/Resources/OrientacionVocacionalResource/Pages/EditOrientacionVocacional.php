<?php

namespace App\Filament\Resources\OrientacionVocacionalResource\Pages;

use App\Filament\Resources\OrientacionVocacionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrientacionVocacional extends EditRecord
{
    protected static string $resource = OrientacionVocacionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
