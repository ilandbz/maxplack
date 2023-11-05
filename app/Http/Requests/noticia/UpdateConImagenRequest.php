<?php

namespace App\Http\Requests\noticia;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConImagenRequest extends FormRequest
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
            'imagen'     => 'required|image|mimes:jpg,jpeg,png,gif,webp|file|max:2000', 
            'titulo'     => 'required|string',
            'subtitulo'  => 'required|string',
            'slug'       => 'required|string|unique:noticias,slug,'.$this->id,
            'contenido'  => 'required|string',
            
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Arhivo Obligatorio',
            'image' => 'Seleccione Solo Imagenes',
            'mimes' => 'El archivo debe ser de tipo:jpg, jpeg, png, gif, webp',
            'dimensions' => 'Las dimensiones de la imagen no son válidas. Debe tener un ancho mínimo de :min_width píxeles y un alto mínimo de :min_height píxeles, y un ancho máximo de :max_width píxeles y un alto máximo de :max_height píxeles',
            'max' => 'El tamaño del archivo no debe superar 2Mb',
            'unique' => 'El slug ya existe'
        ];
    }

}