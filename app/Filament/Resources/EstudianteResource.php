<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstudianteResource\Pages;
use App\Models\Estudiante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EstudianteResource extends Resource
{
    protected static ?string $model = Estudiante::class;
    protected static ?string $navigationGroup = "Gestion academica";
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationBadgeTooltip = 'Total de estudiantes';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nombres')
                ->label('Nombres')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('apellidos')
                ->label('Apellidos')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('dni')
                ->label('DNI')
                ->required()
                ->unique(ignoreRecord: true)
                ->regex('/^[0-9]{8}$/')
                ->maxLength(8)
                ->minLength(8),

            Forms\Components\DatePicker::make('fechaNacimiento')
                ->label('Fecha de Nacimiento')
                ->maxDate(now()->subYears(17)) // mínimo 17 años
                ->required(),

            Forms\Components\Select::make('genero')
                ->label('Género')
                ->required()
                ->options([
                    'm' => 'Masculino',
                    'f' => 'Femenino',
                    'o' => 'Otro',
                ])
                ->native(false),

            Forms\Components\TextInput::make('telefono')
                ->label('Teléfono')
                ->tel()
                ->maxLength(20)
                ->nullable(),

            Forms\Components\TextInput::make('email')
                ->label('Correo Electrónico')
                ->email()
                ->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nombres')
                ->label('Nombres')
                ->searchable(),

            Tables\Columns\TextColumn::make('apellidos')
                ->label('Apellidos')
                ->searchable(),

            Tables\Columns\TextColumn::make('dni')
                ->label('DNI')
                ->searchable(),

            Tables\Columns\TextColumn::make('fechaNacimiento')
                ->label('Fecha de Nacimiento')
                ->date()
                ->sortable(),

            Tables\Columns\TextColumn::make('genero')
                ->label('Género')
                ->formatStateUsing(fn (string $state) => match ($state) {
                    'm' => 'Masculino',
                    'f' => 'Femenino',
                    'o' => 'Otro',
                    default => $state,
                }),

            Tables\Columns\TextColumn::make('telefono')
                ->label('Teléfono')
                ->searchable(),

            Tables\Columns\TextColumn::make('email')
                ->label('Correo Electrónico')
                ->searchable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Creado')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Actualizado')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEstudiantes::route('/'),
            'create' => Pages\CreateEstudiante::route('/create'),
            'edit' => Pages\EditEstudiante::route('/{record}/edit'),
        ];
    }
}
