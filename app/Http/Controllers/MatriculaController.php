<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use Illuminate\Http\Response; // Importa Response para códigos HTTP

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera todas las matrículas.
        // Puedes añadir paginación aquí si la lista es muy larga:
        // return Matricula::paginate(10);
        return Matricula::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos de entrada para la nueva matrícula.
        $validatedData = $request->validate([
            'idEstudiante' => 'required|exists:estudiantes,id', // Debe existir en la tabla estudiantes
            'idCarrera'=> 'required|exists:carreras,id',
            'idPeriodoAcademico' => 'required|exists:periodo_academicos,id', // Debe existir en la tabla periodo_academicos
            'ciclo' => 'required|integer|min:1', // El ciclo debe ser un entero positivo
            'fechaMatricula' => 'required|date', // La fecha de matrícula debe ser una fecha válida
        ]);

        // Crea una nueva instancia de Matricula con los datos validados.
        $matricula = Matricula::create($validatedData);

        // Retorna la matrícula creada con un código de estado 201 (Created).
        return response()->json($matricula, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Busca una matrícula por su ID. Si no la encuentra, lanza una excepción 404.
        return Matricula::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Busca la matrícula a actualizar.
        $matricula = Matricula::findOrFail($id);

        // Valida los datos de entrada para la actualización.
        $validatedData = $request->validate([
            'idEstudiante' => 'sometimes|required|exists:estudiantes,id',
            'idPeriodoAcademico' => 'sometimes|required|exists:periodo_academicos,id',
            'Ciclo' => 'sometimes|required|integer|min:1',
            'fechaMatricula' => 'sometimes|required|date',
        ]);

        // Actualiza la matrícula con los datos validados.
        $matricula->update($validatedData);

        // Retorna la matrícula actualizada con un código de estado 200 (OK).
        return response()->json($matricula, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca la matrícula a eliminar. Si no la encuentra, retorna un 404.
        $matricula = Matricula::find($id);

        if (!$matricula) {
            return response()->json(['message' => 'Matricula no encontrada'], 404);
        }
        // Elimina la matrícula.
        $matricula->delete();
        // Retorna un mensaje de éxito con un código de estado 200 (OK).
        return response()->json(['message' => 'Matricula eliminada exitosamente'], 200);
    }
}
