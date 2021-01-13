<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'username' => 'required|min:3|max:30',
            'password'=> 'required|min:6|max:13|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'El Nombre es requerido.',
            'username.min' => 'El Nombre debe tener minimo 3 caracteres.',
            'username.max' => 'El Nombre debe tener maximo 10 caracteres.',
            'password.required' => 'La Contraseña es requerida.',
            'password.confirmed' => 'Las de Contraseña deben coincidir.',
            'password.min' => 'La Contraseña debe tener minimo 5 caracteres.',
            'password.max' => 'La Contraseña debe tener maximo 13 caracteres.',
        ];
    }
}
