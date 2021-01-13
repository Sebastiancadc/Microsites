<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudRequest extends FormRequest
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
            'name' => 'required|min:1|max:20',
        ];
    }
    public function messages()
    {
        return [
            'name.min' => 'El Nombre debe tener minimo 1 caracteres.',
            'name.max' => 'El Nombre debe tener maximo 20 caracteres.',
            'name.required' => 'El Nombre es requerido.',
        ];
    }
}
