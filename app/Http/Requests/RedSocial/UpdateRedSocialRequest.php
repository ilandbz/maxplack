<?php

namespace App\Http\Requests\RedSocial;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRedSocialRequest extends FormRequest
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
            'titulo'        => 'required|max:25|string|unique:redessociales,titulo,'.$this->id,
            'url'           => 'required|max:190|string',
            'icono'         => 'required|max:25|string',
            'colorfondo'    => 'required|max:25|string',
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