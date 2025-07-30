@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Actividades</h1>
        <!-- Botón de exportar PDF global -->
        <a href="{{ route('actividades.exportar.pdf') }}" target="_blank" class="btn btn-success mb-3">
    Exportar todo en PDF
</a>

          
    </div>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('actividades.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control"
                   placeholder="Buscar por nombre, día u horario...">
            <button type="submit" class="btn btn-secondary">Buscar</button>
            @if(request('buscar'))
                <a href="{{ route('actividades.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            @endif
        </div>
    </form>

    <a href="{{ route('actividades.create') }}" class="btn btn-primary mb-3">Nueva Actividad</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Día</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($actividades as $actividad)
            <tr>
                <td>{{ $actividad->nombre }}</td>
                <td>{{ $actividad->dia_semana }}</td>
                <td>{{ $actividad->horario }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('actividades.edit', $actividad) }}" class="btn btn-sm btn-warning">Editar</a>

                    
                    </a>

                    <form action="{{ route('actividades.destroy', $actividad) }}" method="POST" onsubmit="return confirm('¿Eliminar esta actividad?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No se encontraron actividades.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
