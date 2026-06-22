<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EmpresaActualizarRequest extends FormRequest
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
            'empresa_codigo' => 'required|string|max:7',
            'empresa_nombre' => 'required|string|max:100|unique:empresa,empresa_nombre'
        ];
    }
    public function messages(): array{
        return [
            'empresa_codigo.required' => 'El codigo es obligatorio',
            'empresa_nombre.required' => 'El nombre es obligatorio',
            'empresa_nombre.unique' => 'Cambia la empresa'
        ];
    }
}
