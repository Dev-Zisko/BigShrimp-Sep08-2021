<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255|regex:/^[a-zñA-ZÑáéíóúÁÉÍÓÚ\s]+$/',
            'email' => 'required|max:255|regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/',
            'role' => 'required|string|max:255',
            'password' => 'required|string|max:255|min:8',
            'repassword' => 'required|same:password',
      ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo es obligatorio.',
            'name.regex' =>'El campo nombre solo acepta letras.',
            'email.regex' => 'Ingrese una dirección de correo con formato válido.',
            'same' => 'Los campos de las contraseñas deben coincidir.',
            'min' => 'El campo contraseña debe tener al menos 8 caracteres.',
            'max' => 'Los campos no aceptan más de 255 caracteres.',
        ];
    }
}
