<?php

namespace App\Http\Requests\Convocatoria;

use Illuminate\Foundation\Http\FormRequest;

class StoreConvocatoriaRequest extends FormRequest
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
            'titulo'  => 'required|max:25|string|', 
            'descripcion' => 'required|max:60|string|', 
            'tipo_convocatoria_id' => 'required', 
            'etapa_convocatoria_id' => 'required',
            'fecha_inicio'  => 'required|date',
            'fecha_fin'  => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'string' => 'Ingrese caracteres alfanuméricos',
            'number' => 'Ingrese solo numeros',
            'unique' => 'El :nombre ya existe'
        ];
    }

}