<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alumnos inscritos en {{ $actividad->nombre }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #ddd; }
    </style>
</head>
<body>
    <h2>Alumnos inscritos en la actividad</h2>
    <p><strong>Actividad:</strong> {{ $actividad->nombre }}</p>
    <p><strong>Día:</strong> {{ $actividad->dia_semana }} | <strong>Horario:</strong> {{ $actividad->horario }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th> <!-- O cualquier campo que tenga alumno -->
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $index => $alumno)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->email ?? 'N/A' }}</td>
                </tr>
            @endforeach
            @if($alumnos->isEmpty())
                <tr>
                    <td colspan="3" style="text-align: center;">No hay alumnos inscritos.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>
