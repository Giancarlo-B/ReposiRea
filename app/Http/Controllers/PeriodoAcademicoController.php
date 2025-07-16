<?php

namespace App\Http\Controllers;
use App\Models\PeriodoAcademico;
use Illuminate\Http\Request;

class PeriodoAcademicoController extends Controller
{
    public function index()
    {
        return PeriodoAcademico::all();
    }

    public function show($id)
    {
        return PeriodoAcademico::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after:fechaInicio',
        ]);

        $periodoAcademico = PeriodoAcademico::create($validatedData);
        return response()->json($periodoAcademico, 201);
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
        if (!PeriodoAcademico::find($id)) {
            return response()->json(['message' => 'Postulante not found'], 404);
        }
        PeriodoAcademico::destroy($id);
        return response()->json(['message' => 'Postulante deleted successfully'], 200);
    }
}
