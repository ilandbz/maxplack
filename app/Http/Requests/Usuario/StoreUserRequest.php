<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'              => 'required|unique:users,name',
            'role_id'           => 'required',
            'password'          => 'required|min:6|max:255',
            // 'password'          => 'required|min:6|max:255|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',

        ];
    }

    public function messages()
    {
        return [
            'required' => '* Dato Obligatorio',
            'max' => 'Ingrese Máximo :max caracteres',
            'digits' => 'Ingrese Máximo :digits numeros',
            'string' => 'Ingrese caracteres alfanuméricos',
            'numeric' => 'Ingrese solo numeros',
            'username.unique'    => 'El valor ya existe en la base de datos',
            'password.required' => '* Dato Obligatorio',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.max' => 'La contraseña no puede tener más de :max caracteres.',
            'password.regex' => 'La contraseña debe contener al menos una letra y un número.',

        ];
    }

}