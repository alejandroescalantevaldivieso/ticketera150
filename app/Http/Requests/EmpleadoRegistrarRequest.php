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
            'empleado_nombre' => 'required|max:7|string',
            'empleado_area_codigo' => 'required|max:7|string',
            'empleado_empresa_codigo' => 'required|max:7|string',
        ];
    }

    public function messages():array{
        return[

        ];
    }
}
