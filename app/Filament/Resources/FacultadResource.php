<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FacultadResource\Pages;
use App\Filament\Resources\FacultadResource\RelationManagers;
use App\Models\Facultad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FacultadResource extends Resource
{
    protected static ?string $model = Facultad::class;
    protected static ?string $navigationGroup = 'Administración';
    protected static ?string $navigationLabel = 'Facultades';
    
        public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationBadgeTooltip = 'Total de facultades';

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombFacultad')
                    ->label('Nombre de la Facultad')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombFacultad')
                    ->label('Nombre de la Facultad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de Actualización')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFacultads::route('/'),
            'create' => Pages\CreateFacultad::route('/create'),
            'edit' => Pages\EditFacultad::route('/{record}/edit'),
        ];
    }
}
