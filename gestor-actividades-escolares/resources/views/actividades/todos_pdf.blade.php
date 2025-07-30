<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Actividades y Alumnos</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #000; }
        h1 { text-align: center; margin-bottom: 30px; }
        h2 { margin-top: 20px; font-size: 16px; border-bottom: 1px solid #ccc; }
        ul { padding-left: 20px; }
        li { margin-bottom: 5px; font-size: 14px; color: #007BFF; } /* azul y más grande */
    </style>
</head>
<body>
    <h1>Actividades y Alumnos Inscritos</h1>

    @foreach($actividades as $actividad)
        <h2>{{ $actividad->nombre }} ({{ $actividad->dia_semana }} - {{ $actividad->horario }})</h2>
        <ul>
            @forelse($actividad->alumnos as $alumno)
                <li>{{ $alumno->nombre_completo }}</li>
            @empty
                <li style="color: #888;"><em>No hay alumnos inscritos.</em></li>
            @endforelse
        </ul>
    @endforeach
</body>
</html>
yesy