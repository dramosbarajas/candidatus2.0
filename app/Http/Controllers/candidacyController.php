<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Offer;
use App\Candidate_Offer;

class candidacyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function oget () {
        return response (Offer::where('estado',1)->get(['id','titulo']), 200);
    }

    public function cget () {
        return response (Candidate::get(['id','nombre','apellido1','apellido2']), 200);
        
     }

    public function store (Request $request){
        $result = Candidate_Offer::where(['offer_id'=> $request->offer_id , 'candidate_id' => $request->candidate_id])->get();
        $result = $result->count();     
        if($result === 0){
            Candidate_Offer::create($request->all());
            return response(500);
        }else{
            return response(500);
        }
    }
    public function checkvalidapar (Request $request){
        $result = Candidate_Offer::where(['offer_id'=> $request->offer_id , 'candidate_id' => $request->candidate_id])->get();
        $result = $result->count();     
        return response($result,200);
    }

}
