@extends('layouts.app')


@section('content')
    <h1>Crear Alumno</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

@error('nombre')
    <div class="text-danger">{{ $message }}</div>
@enderror


            </ul>
        </div>
    @endif

    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_completo" class="form-label">Nombre Completo</label>
            <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" value="{{ old('nombre_completo') }}" required>
        </div>

        <div class="mb-3">
            <label for="curso" class="form-label">Curso</label>
            <select name="curso" id="curso" class="form-select" required>
                <option value="">-- Selecciona un curso --</option>
                <option value="primaria_1" {{ old('curso') == 'primaria_1' ? 'selected' : '' }}>Primaria 1º</option>
                    <option value="primaria_2" {{ old('curso') == 'primaria_2' ? 'selected' : '' }}>Primaria 2º</option>
                    <option value="primaria_3" {{ old('curso') == 'primaria_3' ? 'selected' : '' }}>Primaria 3º</option>
                    <option value="primaria_4" {{ old('curso') == 'primaria_4' ? 'selected' : '' }}>Primaria 4º</option>
                    <option value="primaria_5" {{ old('curso') == 'primaria_5' ? 'selected' : '' }}>Primaria 5º</option>
                    <option value="primaria_6" {{ old('curso') == 'primaria_6' ? 'selected' : '' }}>Primaria 6º</option>

                    <option value="eso_1" {{ old('curso') == 'eso_1' ? 'selected' : '' }}>ESO 1º</option>
                    <option value="eso_2" {{ old('curso') == 'eso_2' ? 'selected' : '' }}>ESO 2º</option>
                    <option value="eso_3" {{ old('curso') == 'eso_3' ? 'selected' : '' }}>ESO 3º</option>
                    <option value="eso_4" {{ old('curso') == 'eso_4' ? 'selected' : '' }}>ESO 4º</option>

                    <option value="bachillerato_1" {{ old('curso') == 'bachillerato_1' ? 'selected' : '' }}>Bachillerato 1º</option>
                    <option value="bachillerato_2" {{ old('curso') == 'bachillerato_2' ? 'selected' : '' }}>Bachillerato 2º</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad') }}" min="1" max="120" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
