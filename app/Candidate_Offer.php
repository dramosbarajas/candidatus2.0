<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_Offer extends Model
{

    protected $fillable = [
        'offer_id',
        'candidate_id',
        'estado',
        'entrevista',
        'fecha_entrevista',
        'observaciones',
    ];
}
