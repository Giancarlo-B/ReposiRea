<?php
namespace App\Http\Controllers;
use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostulanteController extends Controller
// añade los metodos de api resource
{
    public function index()
    {
        // Lógica para listar postulantes
        return Postulante::all();
    }

    public function show($id)
    {
        // Lógica para mostrar un postulante específico
        return Postulante::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'names' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'habilidad_destacada' => 'required|string|max:255',
            'sentimiento_destacado' => 'required|string|max:255',
            'motivacion' => 'required|string|max:255',
            'curso_secundaria' => 'required|string|max:255',
            'interpretacion_final' => 'required|string',
            'carreras_intereses' => 'required|array',
            'carreras_intereses.*' => 'string|max:255',
        ]);
        $postulante = Postulante::create($validatedData);
        return response()->json($postulante, 201);
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un postulante existente
        $postulante = Postulante::findOrFail($id);
        $validatedData = $request->validate([
            'names' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'habilidad_destacada' => 'required|string|max:255',
            'sentimiento_destacado' => 'required|string|max:255',
            'motivacion' => 'required|string|max:255',
            'curso_secundaria' => 'required|string|max:255',
            'interpretacion_final' => 'required|string',
            'carreras_intereses' => 'required|array',
            'carreras_intereses.*' => 'string|max:255',
        ]);
        $postulante->update($validatedData);
        return response()->json($postulante, 200);
    }

    public function destroy($id)
    {
        if (!Postulante::find($id)) {
            return response()->json(['message' => 'Postulante not found'], 404);
        }
        Postulante::destroy($id);
        return response()->json(['message' => 'Postulante deleted successfully'], 200);
    }
}
