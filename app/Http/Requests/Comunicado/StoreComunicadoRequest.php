<?php

namespace App\Http\Requests\Comunicado;

use Illuminate\Foundation\Http\FormRequest;

class StoreComunicadoRequest extends FormRequest
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
            'titulo'     => 'required|max:25|string',
            'imagen'     => 'required|image|mimes:jpg,jpeg,png,gif,webp|file|max:2000', 
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'string' => 'Ingrese caracteres alfanuméricos',
            'number' => 'Ingrese solo numeros',
            'unique' => 'El :nombre ya existe',
            'image'  => 'No selecciono una imagen',
            'url'    => 'No tiene el formato de URL'
        ];
    }

}