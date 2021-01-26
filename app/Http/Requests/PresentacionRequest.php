<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresentacionRequest extends FormRequest
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
            'title' => 'required|min:4|max:300',
            'campana' => 'required',
            'fecha' => 'required',
            'color' => 'required',
            'time' => 'required',
            'colortitulos' => 'required',
            'colorcontenido' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'El titulo es requerido.',
            'title.min' => 'El titulo debe tener minimo 4 caracteres.',
            'title.max' => 'El titulo debe tener maximo 30 caracteres.',
            'campana.required' => 'La Campaña es requerida.',
            'fecha.required' => 'La fecha es requerida.',
            'color.required' => 'El color de la diapositiva es requerido.',
            'time.required' => 'El Tiempo de transicion es requerido.',
            'colortitulos.required' => 'El color de los titulos es requerido.',
            'colorcontenido.required' => 'El color del contenido es requerido.',
        ];
    }
}
