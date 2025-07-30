<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActividadResource;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadApiController extends Controller
{
    // public function index()
    // {
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => Actividad::with('alumnos')->get(),
    //     ]);
    // }

    public function index()
{
    $actividades = Actividad::all(); // sin cargar 'alumnos'
    return response()->json([
        'status' => 'success',
        'data' => ActividadResource::collection($actividades),
    ]);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dia_semana' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
        ]);

        $actividad = Actividad::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $actividad,
        ], 201);
    }

    public function show(Actividad $actividad)
    {
        return response()->json([
            'status' => 'success',
            'data' => $actividad->load('alumnos'),
        ]);
    }

    public function update(Request $request, Actividad $actividad)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'dia_semana' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
        ]);

        $actividad->update($validated);

        return response()->json([
            'status' => 'success',
            'data' => $actividad,
        ]);
    }

    public function destroy(Actividad $actividad)
    {
        $actividad->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Actividad eliminada',
        ]);
    }
}
