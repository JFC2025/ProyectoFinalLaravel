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
use App\Http\Controllers\HomeController;

// Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/', function(){
    return view('welcome');
})->name('home');

Route::get('/actividades/exportar/pdf', [ActividadController::class, 'exportarTodoPdf'])
    ->name('actividades.exportar.pdf');