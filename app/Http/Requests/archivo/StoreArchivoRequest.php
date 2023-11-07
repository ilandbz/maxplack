<?php

namespace App\Http\Requests\archivo;

use Illuminate\Foundation\Http\FormRequest;

class StoreArchivoRequest extends FormRequest
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
            'archivo' => 'required|file|max:2000', 
            'titulo'        => 'required|string',
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
            'image' => 'Debe ser de tipo Imagen',
            'mimes' => 'La imagen debe ser solo de tipo: jpg, jpeg, png, gif, webp.',
            'file' => 'La imagen debe ser un archivo'
        ];
    }

}