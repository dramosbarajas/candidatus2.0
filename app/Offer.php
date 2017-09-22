<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = 
    [
        'estado',        
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'puesto',
        'contrato',
        'duracion',
        'formacion',
        'experiencia',
        'rango_sal_min',
        'rango_sal_max'
    ];

}
