<?php

namespace App\Filament\Resources\LlamadaOrientacionResource\Pages;

use App\Filament\Resources\LlamadaOrientacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLlamadaOrientacion extends EditRecord
{
    protected static string $resource = LlamadaOrientacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
