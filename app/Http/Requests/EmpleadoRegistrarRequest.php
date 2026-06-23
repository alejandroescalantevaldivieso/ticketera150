<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRegistrarRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'empleado_codigo' => 'required|max:7|string',
            'empleado_nombre' => 'required|string',
            'empleado_apellido_paterno' => 'required|string',
            'empleado_apellido_materno' => 'required|string',
            'empleado_correo' => 'required|string',
            'empleado_area_codigo' => 'required|max:7|string',
            'empleado_empresa_codigo' => 'required|max:7|string',
        ];
    }

    public function messages():array{
        return[
            'empleado_nombre' => 'El nombre es requerido',
            'empleado_apellido_paterno' => 'El apellido paterno es obligatorio',
            'empleado_apellido_materno' => 'El apellido materno es obligatorio',
            'empleado_correo' => 'El correo es obligatorio'
        ];
    }
}
