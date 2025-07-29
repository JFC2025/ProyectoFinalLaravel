@extends('layouts.app')


@section('content')
    <h1>Nueva Actividad</h1>

    <form action="{{ route('actividades.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
            @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            @error('descripcion') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Día de la semana</label>
            <select name="dia_semana" class="form-control">
                <option value="" disabled selected>Selecciona un día</option>
                <option value="Lunes" {{ old('dia_semana') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                <option value="Martes" {{ old('dia_semana') == 'Martes' ? 'selected' : '' }}>Martes</option>
                <option value="Miércoles" {{ old('dia_semana') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                <option value="Jueves" {{ old('dia_semana') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                <option value="Viernes" {{ old('dia_semana') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                <option value="Sábado" {{ old('dia_semana') == 'Sábado' ? 'selected' : '' }}>Sábado</option>
                <option value="Domingo" {{ old('dia_semana') == 'Domingo' ? 'selected' : '' }}>Domingo</option>
            </select>
            @error('dia_semana') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Horario</label>
            <input type="time" name="horario" class="form-control" value="{{ old('horario') }}">
            @error('horario') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-success">Guardar</button>
    </form>
@endsection
