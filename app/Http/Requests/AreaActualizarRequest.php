<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AreaActualizarRequest extends FormRequest
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
            'area_codigo' => 'required',
            'area_nombre' => 'required|string|max:100|unique:area,area_nombre'
            
        ];
    }

    public function messages():array{
        return[     
            'area_codigo.required' => 'El codigo es obligatorio',       
            'area_nombre.required' => 'El nombre es obligatorio',
            'area_nombre.max' => 'El nombre no debe sobrepasar 100 caracteres',
            'area_nombre.unique' => 'Cambia el nombre del area'
        ];
    }
}
