<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
           'title' => 'required|min:4|max:35',
           'campana' => 'required',
           'fecha' => 'required',
           'image' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El Titulo es requerido.',
            'title.min' => 'El Titulo debe tener minimo 4 caracteres.',
            'title.max' => 'El Titulo debe tener maximo 35 caracteres.',   
            'campana.required' => 'La campaña es requerida.',  
            'fecha.required' => 'La fecha de publicacion es requerida.', 
            'image.required' => 'El archivo es requerido.',    
        ];
    }
}
