<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrientacionVocacionalResource\Pages;
use App\Filament\Resources\OrientacionVocacionalResource\RelationManagers;
use App\Models\OrientacionVocacional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrientacionVocacionalResource extends Resource
{
    protected static ?string $model = OrientacionVocacional::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $navigationGroup = 'Orientacion Vocacional';
    protected static ?string $navigationLabel = 'Orientacion Vocacional';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('idCampoInteres')
                    ->required()
                    ->relationship('campoInteres', 'nombCampoInteres')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombCampoInteres')
                        ->label('Nombre del Campo de Interes del Estudiante')
                        ->unique()
                        ->required()
                        ->maxLength(255),
                    ])
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('idEstudiante')
                    ->relationship('estudiante','nombres')
                    ->required(),
                Forms\Components\TextInput::make('habilidadDestacada')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('motivacion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cursoSecundaria')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('fechaInicio')
                    ->maxDate(now())
                    ->required(),
                Forms\Components\DateTimePicker::make('fechaFinalizacion')
                    ->maxDate(now())
                    ->required(),
                Forms\Components\TextInput::make('interpretacionFinal')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('estado')
                    ->options([
                    'E' => 'En Proceso',
                    'F' => 'Finalizado',
                ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('campoInteres.nombCampoInteres')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estudiante.nombres')
                    ->label('Estudiante')
                    ->sortable(),
                Tables\Columns\TextColumn::make('habilidadDestacada')
                    ->searchable(),
                Tables\Columns\TextColumn::make('motivacion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cursoSecundaria')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fechaInicio')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fechaFinalizacion')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('interpretacionFinal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado'),
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
            'index' => Pages\ListOrientacionVocacionals::route('/'),
            'create' => Pages\CreateOrientacionVocacional::route('/create'),
            'edit' => Pages\EditOrientacionVocacional::route('/{record}/edit'),
        ];
    }
}
