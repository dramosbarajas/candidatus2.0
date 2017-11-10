<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'tipo_id',
        'id',
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

    public function offers()
    {
        return $this->belongsToMany(Offer::class,'candidate__offers')->withPivot('estado', 'entrevista','fecha_entrevista','observaciones');
    }
}
