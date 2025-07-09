<?php

namespace App\Filament\Resources\PostulanteResource\Pages;

use App\Filament\Resources\PostulanteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPostulante extends ViewRecord
{
    protected static string $resource = PostulanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    protected function getViewData(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
