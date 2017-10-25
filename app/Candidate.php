<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'tipo_id',
        'identidad',
        'foto',
        'nombre',
        'apellido1',
        'apellido2',
        'fecha_nac',
        'email',
        'tel',
        'genero',
        'nacionalidad',
        'poblacion',
        'notas',
        'cv',
    ];
}
