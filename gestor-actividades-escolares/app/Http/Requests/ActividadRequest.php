<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:3|max:100',
            'descripcion' => 'required|string|min:10',
            'dia_semana' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado,Domingo',
            'horario' => 'required|string|max:50', // Ej: "15:00 - 17:00"
        ];
    }

     public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la actividad es obligatorio.',
            'nombre.max' => 'El nombre no debe superar los 100 caracteres.',
            'nombre.min' => 'El nombre debe ser mayor a 3 caracteres.',

            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.min' => 'La descripción debe tener al menos 10 caracteres.',

            'dia_semana.required' => 'Debe seleccionar un día de la semana.',
            'dia_semana.in' => 'El día debe ser válido (Lunes a Domingo).',

            'horario.required' => 'Debe especificar un horario.',
            'horario.max' => 'El horario no debe superar los 50 caracteres.',
        ];
    }
}
