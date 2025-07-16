<?php

namespace App\Observers;

use App\Models\Postulante;
use App\Models\CampoInteres;
use App\Models\OrientacionVocacional;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // Importa la fachada Log

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
        // La tabla OrientacionVocacional se vincula directamente con Postulante.

        // 1. Crear registros en la tabla 'OrientacionVocacional'
        $carreras = $postulante->carreras_intereses;

        // Asegurarse de que carreras_intereses sea un array (el cast en el modelo debería manejar esto)
        if (is_string($carreras)) {
            $carreras = json_decode($carreras, true);
        }

        if (is_array($carreras)) {
            foreach ($carreras as $carreraInteresNombre) {
                try {
                    // Buscar o crear el CampoInteres
                    $campoInteres = CampoInteres::firstOrCreate(
                        ['nombCampoInteres' => $carreraInteresNombre]
                    );

                    // Crear la OrientacionVocacional
                    OrientacionVocacional::create([
                        'idPostulante' => $postulante->id,
                        'idCampoInteres' => $campoInteres->id,
                        'fechaInicio' => Carbon::now(),
                    ]);
                    Log::info("OrientacionVocacional creada para Postulante ID: {$postulante->id}, CampoInteres: {$carreraInteresNombre}");

                } catch (\Exception $e) {
                    Log::error("Error al crear OrientacionVocacional para Postulante ID: {$postulante->id}, Carrera: {$carreraInteresNombre}. Error: " . $e->getMessage());
                }
            }
        } else {
            Log::warning("carreras_intereses no es un array válido para Postulante ID: {$postulante->id}. Valor: " . print_r($carreras, true));
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
        //
    }

    /**
     * Handle the Postulante "deleted" event.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return void
     */
    public function deleted(Postulante $postulante)
    {
        //
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
