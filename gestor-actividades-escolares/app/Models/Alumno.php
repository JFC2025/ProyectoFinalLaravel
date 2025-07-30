<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_completo', 'curso', 'edad'];

    // Relación: un alumno tiene muchas inscripciones
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    // Relación actividades del alumno (muchos a muchos) a través de la tabla pivote 'inscripciones'
    public function actividades()
    {
        // Parámetros de belongsToMany:
        // Modelo relacionado: Actividad::class
        // Tabla pivote: 'inscripciones'
        // FK en tabla pivote hacia este modelo (Alumno): 'alumno_id'
        // FK en tabla pivote hacia modelo relacionado (Actividad): 'actividad_id'
        return $this->belongsToMany(Actividad::class, 'inscripciones', 'alumno_id', 'actividad_id');
    }
}
