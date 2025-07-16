<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        return Estudiante::all();
    }
    public function show($id)
    {
        return Estudiante::findOrFail($id);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'names' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'dni' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:estudiantes,email',
            'idCarrera' => 'required|exists:carreras,id',
        ]);

        $estudiante = Estudiante::create($validatedData);
        return response()->json($estudiante, 201);
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {
        if (!Estudiante::find($id)) {
            return response()->json(['message' => 'Estudiante not found'], 404);
        }
        Estudiante::destroy($id);
        return response()->json(['message' => 'Estudiante deleted successfully'], 200);
    }
}
