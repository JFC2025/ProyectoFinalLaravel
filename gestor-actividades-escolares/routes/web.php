<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\InscripcionController;

Route::resource('inscripciones', InscripcionController::class);
Route::resource('alumnos', AlumnoController::class);
Route::resource('actividades', ActividadController::class)->parameters([
    'actividades' => 'actividad'  // parámetro personalizado para actividades
]);
Route::get('actividades/{actividad}/alumnos-pdf', [ActividadController::class, 'exportAlumnosPdf'])->name('actividades.alumnos.pdf');