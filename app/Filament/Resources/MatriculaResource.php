<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatriculaResource\Pages;
use App\Models\Matricula;
use App\Models\Curso;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Tables\Table;

class MatriculaResource extends Resource
{
    protected static ?string $model = Matricula::class;
    protected static ?string $navigationGroup = "Gestion academica";

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Selección de Estudiante
            Forms\Components\Select::make('idEstudiante')
                ->relationship('estudiante', 'DNI')
                ->label('Estudiante')
                ->searchable()
                ->required(),

            // Selección de Carrera
            Forms\Components\Select::make('idCarrera')
                ->relationship('carrera', 'nombCarrera')
                ->label('Carrera')
                ->preload()
                ->searchable()
                ->required(),

            // Selección de Período Académico
            Forms\Components\Select::make('idPeriodoAcademico')
                ->relationship('periodoAcademico', 'nombPeriodo')
                ->label('Período Académico')
                ->searchable()
                ->createOptionForm([
                    Forms\Components\Select::make('nombPeriodo')
                        ->label('Nombre del Período Académico')
                        ->options(collect(range(2025, 2030))->flatMap(fn($year) => [
                            "$year-I" => "$year-I",
                            "$year-II" => "$year-II",
                        ])->toArray())
                        ->required(),
                    Forms\Components\DatePicker::make('fechaInicio')
                        ->label('Fecha de Inicio')
                        ->required(),
                    Forms\Components\DatePicker::make('fechaFin')
                        ->label('Fecha de Fin')
                        ->required(),
                ])
                ->required(),
            // Campo Ciclo
            Forms\Components\TextInput::make('ciclo')
                ->label('Ciclo')
                ->numeric()
                ->minValue(1)
                ->maxValue(12)
                ->required(),

            // Fecha de Matrícula
            Forms\Components\DatePicker::make('fechaMatricula')
                ->label('Fecha de Matrícula')
                ->default(now())
                ->required(),

            // Repetidor para los cursos matriculados
            Forms\Components\Repeater::make('detalleMatriculas')
                ->label('Cursos Matriculados')
                ->relationship()
                ->schema([
                    Forms\Components\Select::make('idCurso')
                        ->label('Curso')
                        ->required()
                        ->reactive()
                        ->searchable()
                        ->preload()
                        ->options(function (callable $get) {
                            $idCarrera = $get('../../idCarrera');
                            if (!$idCarrera) return [];
                            return Curso::where('idCarrera', $idCarrera)
                                ->pluck('nombCurso', 'id')
                                ->toArray();
                        })
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $detalles = $get('../../detalleMatriculas') ?? [];
                            $ids = [];

                            foreach ($detalles as $index => $detalle) {
                                if (!isset($detalle['idCurso']) || !$detalle['idCurso']) continue;

                                if (in_array($detalle['idCurso'], $ids)) {
                                    $set("detalleMatriculas.{$index}.idCurso", null);
                                    Notification::make()
                                        ->title('Curso Duplicado')
                                        ->body('Este curso ya fue seleccionado.')
                                        ->warning()
                                        ->send();
                                    break;
                                }

                                $ids[] = $detalle['idCurso'];
                            }
                        }),
                ])
                ->columns(1)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('estudiante.nombres')->label('Estudiante'),
            Tables\Columns\TextColumn::make('carrera.nombCarrera')->label('Carrera'),
            Tables\Columns\TextColumn::make('periodoAcademico.nombPeriodo')->label('Período Académico'),
            Tables\Columns\TextColumn::make('fechaMatricula')->label('Fecha de Matrícula')->date(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\ViewAction::make(),
            
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMatriculas::route('/'),
            'create' => Pages\CreateMatricula::route('/create'),
            'edit' => Pages\EditMatricula::route('/{record}/edit'),
        ];
    }
}
