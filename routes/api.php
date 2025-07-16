<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PeriodoAcademicoController;
use App\Http\Controllers\MatriculaController;


Route::apiResource('/postulantes', PostulanteController::class);
Route::apiResource('/estudiantes', EstudianteController::class);
Route::apiResource('/carreras', CarreraController::class);
Route::apiResource('/periodoAcademicos', PeriodoAcademicoController::class);
Route::apiResource('/matriculas', MatriculaController::class);
