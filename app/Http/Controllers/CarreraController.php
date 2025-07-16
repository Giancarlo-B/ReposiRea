<?php

namespace App\Http\Controllers;
use App\Models\Carrera;

use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        return Carrera::all();
    }
    public function show($id)
    {
        return Carrera::findOrFail($id);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'duracion' => 'required|integer|min:1',
        ]);

        $carrera = Carrera::create($validatedData);
        return response()->json($carrera, 201);
    }
    public function update(Request $request, $id)
    {
        // Logic to update an existing carrera
    }

    public function destroy($id)
    {
        if (!Carrera::find($id)) {
            return response()->json(['message' => 'Carrera not found'], 404);
        }
        Carrera::destroy($id);
        return response()->json(['message' => 'Carrera deleted successfully'], 200);
    }
}
