<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AlumnoResource;
use App\Http\Resources\ActividadResource;

class InscripcionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'alumno' => new AlumnoResource($this->whenLoaded('alumno')),
            'actividad' => new ActividadResource($this->whenLoaded('actividad')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
