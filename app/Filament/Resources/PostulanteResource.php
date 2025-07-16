<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostulanteResource\Pages;
use App\Filament\Resources\PostulanteResource\RelationManagers;
use App\Models\Postulante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostulanteResource extends Resource
{
    protected static ?string $model = Postulante::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';
    protected static ?string $navigationGroup = 'Orientacion Vocacional';
    protected static ?string $navigationLabel = 'Postulantes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('names')
                    ->label('Nombres')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('apellidos')
                    ->label('Apellidos')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->required(),
                Forms\Components\TextInput::make('habilidad_destacada')
                    ->label('Habilidad Destacada')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('motivacion')
                    ->label('Motivación')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('curso_secundaria')
                    ->label('Curso Secundaria')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('interpretacion_final')
                    ->label('Interpretación Final')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('carreras_intereses')
                    ->label('Carreras de Interés')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('names')
                    ->label('Nombres'),
                Tables\Columns\TextColumn::make('apellidos')
                    ->label('Apellidos'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPostulantes::route('/'),
            'create' => Pages\CreatePostulante::route('/create'),
            'view' => Pages\ViewPostulante::route('/{record}'),
            'edit' => Pages\EditPostulante::route('/{record}/edit'),
        ];
    }
}
