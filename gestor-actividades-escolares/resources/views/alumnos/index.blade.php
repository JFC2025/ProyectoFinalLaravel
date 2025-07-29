@extends('layouts.app')


@section('content')
    <h1>Alumnos</h1>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-3">Nuevo Alumno</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->nombre_completo }}</td>
                <td>{{ $alumno->curso }}</td>
                <td>{{ $alumno->edad }}</td>
                <td>
                    <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
