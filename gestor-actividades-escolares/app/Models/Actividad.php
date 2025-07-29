<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = ['nombre', 'descripcion', 'dia_semana', 'horario'];

    // Relación: una actividad tiene muchas inscripciones
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    // Relación a través de inscripciones: alumnos inscritos en la actividad
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'inscripciones');
    }

    // Método estático para búsqueda por nombre, día y horario
    public static function buscar($termino)
    {
        return self::where('nombre', 'like', "%{$termino}%")
            ->orWhere('dia_semana', 'like', "%{$termino}%")
            ->orWhere('horario', 'like', "%{$termino}%");
    }
}
