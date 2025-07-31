@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Inscripciones</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('inscripciones.create') }}" class="btn btn-primary mb-3">Nueva Inscripción</a>

    @if ($inscripciones->isEmpty())
        <p>No hay inscripciones registradas.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Actividad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->alumno->nombre_completo }}</td>
                        <td>{{ $inscripcion->actividad->descripcion }}</td>
                        <td>
                            <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta inscripción?')">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
