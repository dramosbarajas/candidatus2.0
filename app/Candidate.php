<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'tipo_id',
        'identidad',
        'fecha_nac',
        'genero',
        'nombre',
        'apellido1',
        'apellido2',
        'email',
        'tel',
        'nacionalidad',
        'provincia',
        'poblacion',
        'notas',
        'cv',
    ];
}
