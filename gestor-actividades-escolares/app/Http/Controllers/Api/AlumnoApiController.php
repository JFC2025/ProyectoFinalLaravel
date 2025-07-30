<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumnoApiController extends Controller
{
    // Obtener todos los alumnos
    public function index()
    {
        return response()->json(Alumno::all(), 200);
    }

    // Obtener un alumno por ID
    public function show($id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        }

        return response()->json($alumno, 200);
    }

    // Crear un nuevo alumno
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_completo' => 'required|string|max:255',
            'edad' => 'required|integer|min:1',
            'email' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], 422);
        }

        $alumno = Alumno::create($request->all());

        return response()->json($alumno, 201);
    }

    // Actualizar un alumno existente
    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_completo' => 'sometimes|required|string|max:255',
            'edad' => 'sometimes|required|integer|min:1',
            'email' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errores' => $validator->errors()], 422);
        }

        $alumno->update($request->all());

        return response()->json($alumno, 200);
    }

    // Eliminar un alumno
    public function destroy($id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        }

        $alumno->delete();

        return response()->json(['mensaje' => 'Alumno eliminado correctamente'], 200);
    }
}
