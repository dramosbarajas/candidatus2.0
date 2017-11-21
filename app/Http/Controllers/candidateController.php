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
        return Candidate::with('offers')->get();
    }
    public function checkidentity($id)
    {  
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
        if ($request->isJson()) {
            Candidate::create($request->all());
            return response()->json($request->all(),200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function uploadCV(Request $request)
    {
        $pathfile = $request->file('cv')->store('public');
        $pathfile = str_replace('public','storage',$pathfile);
        Candidate::where('id', $request->id)->update(array('cv' => $pathfile));
        return 200;      
    }

    public function destroy(Request $request,$id)
    {
        try {
            $candidate = Offer::findOrFail($id);
            $candidate->delete();
            return response()->json($offer, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'No content'], 406);
        }
    }
}
