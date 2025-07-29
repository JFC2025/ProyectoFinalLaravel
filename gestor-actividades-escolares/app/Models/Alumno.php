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

    // Relación a través de inscripciones: actividades del alumno
    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'inscripciones');
    }
}
