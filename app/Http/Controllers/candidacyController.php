<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Offer;
use App\Candidate_Offer;

class candidacyController extends Controller
{
    public function oget () {
        return response (Offer::get(['id','titulo']), 200);
    }

    public function cget () {
        return response (Candidate::get(['id','nombre','apellido1','apellido2']), 200);
        
     }

    public function store (Request $request){
        
        
        Candidate_Offer::create($request->all());
        return 200;
    }
}
