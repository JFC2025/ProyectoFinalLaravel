@extends('layouts.inicio')

@section('content')
    <p>Bienvenido al Gestor de Actividades Escolares.</p>
    <p>Aquí puedes gestionar las actividades, alumnos e inscripciones fácilmente.</p>

    <!-- Imagen centrada
    <div class="text-center my-4">
        <img src="{{ asset('css/imagen/escuela.jpg') }}" alt="Logo Escuela" width="375" class="mb-3">
    </div> -->

    <!-- Botón centrado, rojo y grande -->
    <div class="text-center mt-3">
        <a href="{{ route('alumnos.index') }}" class="btn btn-danger btn-lg px-5 py-3" style="font-size: 1.5rem;">
            Inicio
        </a>
    </div>
@endsection
s