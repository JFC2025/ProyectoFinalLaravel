<?php
use App\Http\Controllers\Api\ActividadApiController;
use App\Http\Controllers\Api\AlumnoApiController;
use App\Http\Controllers\Api\InscripcionApiController;
use Illuminate\Support\Facades\Route;


Route::apiResource('actividades', ActividadApiController::class);
Route::apiResource('alumnos', AlumnoApiController::class);
Route::apiResource('inscripciones', InscripcionApiController::class);
