<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = 
    [
        'estado',        
        'fecha',
        'titulo',
        'descripcion',
        'departamento',
        'estudios',
        'experiencia',
        'contrato',
        'duracion',
        'jornada',
        'bandamin',
        'bandamax',
        'vacante'
    ];

}
