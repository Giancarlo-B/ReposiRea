<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LlamadaOrientacionResource\Pages;
use App\Filament\Resources\LlamadaOrientacionResource\RelationManagers;
use App\Models\LlamadaOrientacion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LlamadaOrientacionResource extends Resource
{
    protected static ?string $model = LlamadaOrientacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone-arrow-up-right';
    protected static ?string $navigationLabel = 'Llamada de Orientacion';
    protected static ?string $navigationGroup = 'Orientacion Vocacional';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('idOrientacionVocacional')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('numLlamada')
                    ->required(),
                Forms\Components\DateTimePicker::make('fechaLlamada')
                    ->maxDate(now())
                    ->required(),
                Forms\Components\TextInput::make('duracionLlamada')
                    ->required(),
                Forms\Components\TextInput::make('Analisis')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('idOrientacionVocacional')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('numLlamada'),
                Tables\Columns\TextColumn::make('fechaLlamada')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('duracionLlamada'),
                Tables\Columns\TextColumn::make('Analisis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListLlamadaOrientacions::route('/'),
            'create' => Pages\CreateLlamadaOrientacion::route('/create'),
            'edit' => Pages\EditLlamadaOrientacion::route('/{record}/edit'),
        ];
    }
}
