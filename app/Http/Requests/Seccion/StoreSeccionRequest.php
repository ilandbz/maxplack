<?php

namespace App\Http\Requests\Seccion;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'     => 'required|max:120|string|unique:secciones_principals,titulo',
            'contenido'     => 'required|string',
            'orden'     => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'string' => 'Ingrese caracteres alfanuméricos',
            'numeric' => 'Ingrese solo numeros',
            'unique' => 'El :nombre ya existe'
        ];
    }

}