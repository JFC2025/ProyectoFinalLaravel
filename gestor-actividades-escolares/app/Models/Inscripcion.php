<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscripcion extends Model
{
    use HasFactory;

    // Nombre explícito de la tabla (opcional si sigue convención)
    protected $table = 'inscripciones';

    // Campos que se pueden asignar masivamente
    protected $fillable = ['alumno_id', 'actividad_id'];

    // Si no usas timestamps en esta tabla, puedes desactivarlos
    // public $timestamps = false;

    /**
     * Una inscripción pertenece a un alumno.
     */
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    /**
     * Una inscripción pertenece a una actividad.
     */
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }
}
