<?php

namespace App\Observers;

use App\Models\Postulante;
use App\Models\Estudiante;
use App\Models\OrientacionVocacional;
use App\Models\CampoInteres;
use Carbon\Carbon; // Para manejar fechas

class PostulanteObserver
{
    /**
     * Handle the Postulante "created" event.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return void
     */
    public function created(Postulante $postulante)
    {
        // 1. Crear un nuevo registro en la tabla 'estudiantes'
        // NOTA: Algunos campos de 'estudiantes' (dni, fecha_nacimiento, genero, telefono, email)
        // no están directamente en 'postulantes'. Aquí se usan valores por defecto o null.
        // DEBES ajustar esto según cómo obtengas estos datos o si necesitas que el postulante los proporcione.
        $estudiante = Estudiante::create([
            'nombres' => $postulante->names,
            'apellidos' => $postulante->apellidos,
            'dni' => null, // Asumimos null, ajusta si tienes este dato en postulante
            'fecha_nacimiento' => Carbon::now()->subYears(18), // Fecha de nacimiento por defecto (ej. 18 años atrás)
            'genero' => 'o', // Género por defecto 'otro'
            'telefono' => null, // Asumimos null
            'email' => null, // Asumimos null, si necesitas un email único, asegúrate de que el postulante lo tenga
        ]);

        // 2. Crear registros en la tabla 'orientacion_vocacionals'
        // Esto se hace por cada carrera de interés del postulante.
        // 'carreras_intereses' es un JSON array, por eso se itera.
        if (is_array($postulante->carreras_intereses)) {
            foreach ($postulante->carreras_intereses as $carreraInteresNombre) {
                // Buscar o crear el CampoInteres
                $campoInteres = CampoInteres::firstOrCreate(
                    ['nombre' => $carreraInteresNombre]
                );

                // Crear la OrientacionVocacional
                OrientacionVocacional::create([
                    'idCampoInteres' => $campoInteres->id,
                    'idEstudiante' => $estudiante->id,
                    'fecha_inicio' => Carbon::now(),
                    'estado' => 'E', // Estado 'E' por defecto
                ]);
            }
        }
    }

    /**
     * Handle the Postulante "updated" event.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return void
     */
    public function updated(Postulante $postulante)
    {
        // Puedes añadir lógica aquí si necesitas actualizar estudiantes u orientaciones
        // cuando un postulante es actualizado.
    }

    /**
     * Handle the Postulante "deleted" event.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return void
     */
    public function deleted(Postulante $postulante)
    {
        // Puedes añadir lógica aquí si necesitas eliminar estudiantes u orientaciones
        // cuando un postulante es eliminado.
    }

    /**
     * Handle the Postulante "restored" event.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return void
     */
    public function restored(Postulante $postulante)
    {
        //
    }

    /**
     * Handle the Postulante "force deleted" event.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return void
     */
    public function forceDeleted(Postulante $postulante)
    {
        //
    }
}
