@extends('layouts.inicio')

@section('content')
    <p>Bienvenido al Gestor de Actividades Escolares.</p>
    <p>Aquí puedes gestionar las actividades, alumnos e inscripciones fácilmente.</p>

    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('alumnos.index') }}" class="btn btn-primary">
            Inicio
        </a>
    </div>
@endsection
