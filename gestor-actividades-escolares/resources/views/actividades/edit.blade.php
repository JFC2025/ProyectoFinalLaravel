@extends('layouts.app')


@section('content')
    <h1>Editar Actividad</h1>

    <form action="{{ route('actividades.update', $actividad->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $actividad->nombre) }}">
            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control">{{ old('descripcion', $actividad->descripcion) }}</textarea>
            @error('descripcion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dia_semana">Día de la semana</label>
            <input type="text" id="dia_semana" name="dia_semana" class="form-control" value="{{ old('dia_semana', $actividad->dia_semana) }}">
            @error('dia_semana')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="horario">Horario</label>
            <input type="text" id="horario" name="horario" class="form-control" value="{{ old('horario', $actividad->horario) }}">
            @error('horario')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
