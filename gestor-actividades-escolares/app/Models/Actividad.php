<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = ['nombre', 'descripcion', 'dia_semana', 'horario'];

    // Una actividad tiene muchas inscripciones
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

    // Muchos a muchos con alumnos a través de la tabla pivote 'inscripciones'
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'inscripciones');
    }
}
