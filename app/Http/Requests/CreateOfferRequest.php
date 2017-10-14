<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfferRequest extends FormRequest
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
            'estado' => 'required',
            'fecha' => 'required',
            'titulo' => 'string|required|max:30|min:6',
            'descripcion' => 'string|required|min:100|max:600', 
            'departamento' => 'required', 
            'estudios' => 'required', 
            'experiencia' => 'required', 
            'contrato' => 'required', 
            'duracion' => 
            array(
                'required',
                'regex:/([0-9]){1,2}/'
            ),
            'jornada' => 'required', 
            'bandamin' => 
            array(
                'required',
                'regex:/([0-9]){4,5}/'
            ),
            'bandamax' => 
            array(
                'required',
                'regex:/([0-9]){4,5}/'
            ),
            'vacante' => 
            array(
                'required',
                'regex:/([0-9]){1,2}/'
            ),
        ];
    }
}
