<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use \App\Http\Requests\ActividadRequest;
use Barryvdh\DomPDF\Facade\Pdf;

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
    public function store(ActividadRequest $request)
    {
        Actividad::create($request->validated());

        return redirect()->route('actividades.index')->with('success', 'Actividad creada correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Actividad $actividad)
    {
        return view('actividades.edit', compact('actividad'));
    }

    // Actualizar actividad existente
    public function update(ActividadRequest $request, Actividad $actividad)
    {
        // $request->validate([
        //     'nombre' => 'required|string|max:100',
        //     'descripcion' => 'required|string',
        //     'dia_semana' => 'required|string',
        //     'horario' => 'required|string',
        // ]);

        $actividad->update($request->all());

        return redirect()->route('actividades.index')->with('success', 'Actividad actualizada correctamente.');
    }

    // Eliminar actividad
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('actividades.index')->with('success', 'Actividad eliminada correctamente.');
    }

    // Exportar PDF con lista de alumnos inscritos en la actividad
public function exportarTodoPdf()
{
    $actividades = Actividad::with('alumnos')->get();

    $pdf = Pdf::loadView('actividades.todos_pdf', compact('actividades'));

    return $pdf->download('actividades_con_alumnos.pdf');
}
}
