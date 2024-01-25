<?php

namespace App\Http\Requests\Organizacion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizacionRequest extends FormRequest
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
            'ruc' => 'required|numeric|digits:11',
            'razon_social' => 'required|string',
            'titulo' => 'required|string',
            'slogan' => 'required|string',
            'descripcion' => 'required|string',
            'director' => 'required|string',
            'direccion' => 'required|string',
            'url_web' => 'required|string',
            'quienes_somos' => 'required|string',
            'vision' => 'required|string',
            'mision' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo tamaño :max caracteres',
            'digits' => 'Solo se aceptan 11 digitos',
            'string' => 'Ingrese caracteres alfanuméricos',
            'numeric' => 'Ingrese solo numeros',
            'email'  => 'No es un formato email',

        ];
    }

}