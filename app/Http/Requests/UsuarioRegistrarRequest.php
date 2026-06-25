<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRegistrarRequest extends FormRequest
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
            'usuario_codigo' => 'required|string|max:7',
            'usuario_nombre' => 'required|unique:usuario,usuario_nombre',
            'usuario_contrasena' => 'required',
            'usuario_empleado_codigo' => 'required|string|max:7|unique:usuario,usuario_empleado_codigo',
            'usuario_rol_codigo' => 'required|string|max:7'
        ];
    }

    public function messages():array{
        return [
            'usuario_codigo.required' => 'El codigo es obligatorio',
            'usuario_nombre.unique' => 'El usuario ya existe',
            'usuario_nombre.required' => 'El nombre es obligatorio',
            'usuario_contrasena.required' => 'La constraseña es obligatorio',
        ];
    }
}
