<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarreraResource\Pages;
use App\Filament\Resources\CarreraResource\RelationManagers;
use App\Models\Carrera;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarreraResource extends Resource
{
    protected static ?string $model = Carrera::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationBadgeTooltip = 'Total de carreras';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Administración';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombCarrera')
                    ->label('Nombre de la Carrera')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('duracion')
                    ->label('Duración (en años)')
                    ->numeric()
                    ->required()
                    ->minValue(1)
                    ->maxValue(10),
                Forms\Components\TextInput::make('precioMatricula')
                    ->label('Precio de Matricula')
                    ->required(),
                Forms\Components\Select::make('idFacultad')
                    ->label('Facultad')
                    ->relationship('facultad', 'nombFacultad')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombFacultad')
                            ->label('Nombre de la Facultad')
                            ->required()
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombCarrera')
                    ->label('Nombre de la Carrera')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duracion')
                    ->label('Duración (años)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('facultad.nombFacultad')
                    ->label('Facultad')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //Filtro por Facultada
                Tables\Filters\SelectFilter::make('idFacultad')
                    ->label('Facultad')
                    ->relationship('facultad', 'nombFacultad')
                    ->searchable(),
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
            'index' => Pages\ListCarreras::route('/'),
            'create' => Pages\CreateCarrera::route('/create'),
            'edit' => Pages\EditCarrera::route('/{record}/edit'),
        ];
    }
}
