<?php

namespace App\Http\Requests\navs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNavRequest extends FormRequest
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
            'nombre'     => 'required|max:25|string|unique:navs,nombre,'.$this->id,
            'ruta'       => 'required|max:25|string|unique:navs,ruta,'.$this->id,
            'slug'       => 'required|max:25|string|unique:navs,slug,'.$this->id,
            'orden'      => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'string' => 'Ingrese caracteres alfanuméricos',
            'numeric' => 'Ingrese solo numeros',
            'unique' => 'El :email ya existe'
        ];
    }

}