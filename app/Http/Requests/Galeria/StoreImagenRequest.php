<?php

namespace App\Http\Requests\Galeria;

use Illuminate\Foundation\Http\FormRequest;

class StoreImagenRequest extends FormRequest
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
            'imagen'        => 'required|image|mimes:jpg,jpeg,png,gif,webp|file|max:2000', 
            'galeria_id'    => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'string' => 'Ingrese caracteres alfanuméricos',
            'numeric' => 'Ingrese solo numeros',
            'unique' => 'El :nombre ya existe',
            'image' => 'Debe ser de tipo Imagen',
            'mimes' => 'La imagen debe ser solo de tipo: jpg, jpeg, png, gif, webp.',
            'file' => 'La imagen debe ser un archivo'
        ];
    }

}