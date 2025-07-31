<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AlumnoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'string|min:3|max:100',
            'edad' => 'required|integer|min:6|max:18',
            'curso' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre debe tener menos de 100 caracteres.',
            'edad.min' => 'La edad debe ser igual o mayor a 6',
            'edad.max' => 'La edad debe ser menor de 18',
            'edad.required' => 'La edad es obligatoria.',
            'curso.required' => 'El curso es obligatorio.',
        ];
    }

    /**
     * Personaliza qué hacer cuando falla la validación
     */
    protected function failedValidation(Validator $validator)
    {
        // Puedes lanzar una excepción con respuesta JSON, ideal para APIs
        throw new HttpResponseException(
            redirect()->back()
             ->withErrors($validator)
             ->withInput()
        );


    }
}
