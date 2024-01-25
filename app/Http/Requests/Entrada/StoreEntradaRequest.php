<?php

namespace App\Http\Requests\Entrada;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntradaRequest extends FormRequest
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
            'titulo'     => 'required|max:25|string|unique:entradas,titulo',
            'slug'       => 'required|max:25|string|unique:entradas,slug',
            'ruta'       => 'required|max:25',
            'contenido'  => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'string' => 'Ingrese caracteres alfanuméricos',
            'number' => 'Ingrese solo numeros',
            'unique' => 'El :titulo ya existe'
        ];
    }

}