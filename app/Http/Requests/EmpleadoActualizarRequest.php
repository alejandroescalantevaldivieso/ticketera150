<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class EmpleadoActualizarRequest extends FormRequest
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
            'empleado_apellido_paterno' => 'required',
            'empleado_apellido_materno' => 'required',
            'empleado_correo' => [
                'required',
                'email',
                Rule::unique('empleado','empleado_correo')->ignore($this->empleado_codigo, 'empleado_codigo')
            ],
            'empleado_area_codigo' => 'required|max:7|string',
            'empleado_empresa_codigo' => 'required|max:7|string',
        ];
    }
}
