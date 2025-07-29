@extends('layouts.app')

@section('content')
    <h1>Editar Inscripción #{{ $inscripcion->id }}</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inscripciones.update', $inscripcion) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="alumno_id">Alumno:</label>
        <select name="alumno_id" id="alumno_id" required>
            <option value="">Selecciona un alumno</option>
            @foreach($alumnos as $alumno)
                <option value="{{ $alumno->id }}" {{ $inscripcion->alumno_id == $alumno->id ? 'selected' : '' }}>
                    {{ $alumno->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="actividad_id">Actividad:</label>
        <select name="actividad_id" id="actividad_id" required>
            <option value="">Selecciona una actividad</option>
            @foreach($actividades as $actividad)
                <option value="{{ $actividad->id }}" {{ $inscripcion->actividad_id == $actividad->id ? 'selected' : '' }}>
                    {{ $actividad->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('inscripciones.index') }}">Volver al listado</a>
@endsection
