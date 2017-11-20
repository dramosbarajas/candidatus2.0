<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
class candidateController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(){
        //return  Candidate::get();
        return Candidate::with('offers')->get();
    }
    public function checkidentity($id)
    {
        //if (!$request->ajax()) return redirect('/');   
        return response (Candidate::where('id', $id)->count(), 200);
    }

    public function findcandidate(Request $request)
    {
        if ($request->isJson()) {
            return response()->json(Candidate::where('id', $request->id)->get(),200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
        
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
        Candidate::where('id', $request->id)->update(array('cv' => $pathfile));
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
