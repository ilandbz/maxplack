<?php

namespace App\Http\Requests\Directorio;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectorioRequest extends FormRequest
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
            'titulo'        => 'required|max:90|string',
            'dni'           => 'required|numeric|digits:8|unique:directorios,dni',
            'area_id'       => 'required|integer',
            'cargo_id'      => 'required|integer',
            'foto'          => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2000', 
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'string' => 'Ingrese caracteres alfanuméricos',
            'numeric' => 'Ingrese solo numeros',
            'unique' => 'El :dni ya existe',
            'email'  => 'No es un formato de correo Valido',
            'image'  => 'Ingrese una foto',
            'mimes'  => 'Ingrese solo extensiones jpg,jpeg,png,gif,webp',
            'digits' => 'maximo 8 numeros'
        ];
    }

}