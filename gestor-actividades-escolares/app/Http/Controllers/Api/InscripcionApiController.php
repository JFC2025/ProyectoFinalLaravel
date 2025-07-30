<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inscripcion;
use App\Models\Alumno;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InscripcionApiController extends Controller
{
    // Listar todas las inscripciones
    public function index()
    {
        $inscripciones = Inscripcion::with(['alumno', 'actividad'])->get();
        return response()->json($inscripciones, 200);
    }

    // Mostrar una inscripción específica
    public function show($id)
    {
        $inscripcion = Inscripcion::with(['alumno', 'actividad'])->find($id);

        if (!$inscripcion) {
            return response()->json(['error' => 'Inscripción no encontrada'], 404);
        }

        return response()->json($inscripcion, 200);
    }

    // Crear una nueva inscripción
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alumno_id' => 'required|exists:alumnos,id',
            'actividad_id' => 'required|exists:actividades,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], 422);
        }

        // Verificar si ya está inscrito
        $existe = Inscripcion::where('alumno_id', $request->alumno_id)
                             ->where('actividad_id', $request->actividad_id)
                             ->first();

        if ($existe) {
            return response()->json(['error' => 'El alumno ya está inscrito en esta actividad'], 409);
        }

        $inscripcion = Inscripcion::create($request->all());

        return response()->json($inscripcion, 201);
    }

    // Eliminar una inscripción
    public function destroy($id)
    {
        $inscripcion = Inscripcion::find($id);

        if (!$inscripcion) {
            return response()->json(['error' => 'Inscripción no encontrada'], 404);
        }

        $inscripcion->delete();

        return response()->json(['mensaje' => 'Inscripción eliminada correctamente'], 200);
    }
}
