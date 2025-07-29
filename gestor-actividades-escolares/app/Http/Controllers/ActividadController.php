<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    // Mostrar lista de actividades con búsqueda
    public function index(Request $request)
    {
        $termino = $request->input('buscar');

        $actividades = Actividad::when($termino, function ($query, $termino) {
            return $query->where('nombre', 'like', "%{$termino}%")
                         ->orWhere('dia_semana', 'like', "%{$termino}%")
                         ->orWhere('horario', 'like', "%{$termino}%");
        })->get();

        return view('actividades.index', compact('actividades', 'termino'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('actividades.create');
    }

    // Guardar nueva actividad
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'dia_semana' => 'required|string',
            'horario' => 'required|string',
        ]);

        Actividad::create($request->only(['nombre', 'descripcion', 'dia_semana', 'horario']));

        return redirect()->route('actividades.index')->with('success', 'Actividad creada correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Actividad $actividad)
    {
        return view('actividades.edit', compact('actividad'));
    }

    // Actualizar actividad existente
    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'dia_semana' => 'required|string',
            'horario' => 'required|string',
        ]);

        $actividad->update($request->only(['nombre', 'descripcion', 'dia_semana', 'horario']));

        return redirect()->route('actividades.index')->with('success', 'Actividad actualizada correctamente.');
    }

    // Eliminar actividad
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('actividades.index')->with('success', 'Actividad eliminada correctamente.');
    }
}
