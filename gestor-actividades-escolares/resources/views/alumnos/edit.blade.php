@extends('layouts.app')


@section('content')
    <h1>Editar Alumno</h1>

    <form action="{{ route('alumnos.update', $alumno) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nombre completo</label>
            <input type="text" name="nombre_completo" class="form-control" value="{{ old('nombre_completo', $alumno->nombre_completo) }}">
            @error('nombre_completo') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Curso</label>
            <input type="text" name="curso" class="form-control" value="{{ old('curso', $alumno->curso) }}">
            @error('curso') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label>Edad</label>
            <input type="number" name="edad" class="form-control" value="{{ old('edad', $alumno->edad) }}">
            @error('edad') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
@endsection
