@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($inscripcion) ? 'Editar Inscripción' : 'Nueva Inscripción' }}</h1>

    <form action="{{ isset($inscripcion) ? route('inscripciones.update', $inscripcion->id) : route('inscripciones.store') }}" method="POST">
        @csrf
        @if(isset($inscripcion))
            @method('PUT')
        @endif

        {{-- Alumno --}}
        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-select" required>
                <option value="">Seleccione un alumno</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->id }}" {{ (old('alumno_id', $inscripcion->alumno_id ?? '') == $alumno->id) ? 'selected' : '' }}>
                        {{ $alumno->nombre_completo }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Actividad --}}
        <div class="mb-3">
            <label for="actividad_id" class="form-label">Actividad</label>
            <select name="actividad_id" id="actividad_id" class="form-select" required>
                <option value="">Seleccione una actividad</option>
                @foreach($actividades as $actividad)
                    <option value="{{ $actividad->id }}" {{ (old('actividad_id', $inscripcion->actividad_id ?? '') == $actividad->id) ? 'selected' : '' }}>
                        {{ $actividad->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($inscripcion) ? 'Actualizar' : 'Guardar' }}</button>
        <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
