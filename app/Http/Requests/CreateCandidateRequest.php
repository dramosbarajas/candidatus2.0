<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCandidateRequest extends FormRequest
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
            'tipo_id' => 'string|required',
            'id' => 'string|required',
            'fecha_nac' => 'date|required',
            'genero' => 'string|required', 
            'nombre' => 'string|required', 
            'apellido1' => 'string|required', 
            'apellido2' => 'string|required', 
            'email' => 'email|required', 
            'tel' => 
            array(
                'required',
                'regex:/([0-9]){9}/'
            ),
            'nacionalidad' => 'string|required', 
            'provincia' => 'integer|required', 
            'poblacion' => 'string|required', 
            
           
        ];
    }
}
