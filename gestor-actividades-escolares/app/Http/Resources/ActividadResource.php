<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AlumnoResource;

class ActividadResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'dia_semana' => $this->dia_semana,
            'horario' => $this->horario,
            // Relación alumnos: se carga solo si está eager loaded
            'alumnos' => AlumnoResource::collection($this->whenLoaded('alumnos')),
        ];
    }
}
