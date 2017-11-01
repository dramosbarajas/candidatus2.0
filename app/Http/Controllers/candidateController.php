<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
class candidateController extends Controller
{
    
    public function checkidentity($id)
    {
        //if (!$request->ajax()) return redirect('/');   
        return response (Candidate::where('identidad', $id)->count(), 200);
    }

    public function findcandidate(Request $request)
    {
        
        return response(Candidate::where('identidad', $request->identidad)->get(),200);
        
    }

    public function store(\App\Http\Requests\CreateCandidateRequest $request)
    {
        Candidate::create($request->all());
        return 200;
    }

    public function uploadCV(Request $request)
    {
        $pathfile = $request->file('cv')->store('public');
        $pathfile = str_replace('public','storage',$pathfile);
        Candidate::where('identidad', $request->identidad)->update(array('cv' => $pathfile));
        return 200;      
    }


    public function show($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
        
    }

    public function destroy($id)
    {
        
    }
}
