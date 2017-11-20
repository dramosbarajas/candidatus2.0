<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use App\Candidates;

class offerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Offer::with('candidates')->orderBy('estado', 'DESC')->get();
       
    }

    public function countOffers()
    {   
            $countactives = Offer::where('estado', 1)->count();
            $countclosed = Offer::where('estado', 0)->count();
            return response()
            ->json(['actives' => $countactives, 'closed' => $countclosed]);  
    }

    public function store(\App\Http\Requests\CreateOfferRequest $request)
    {   
            Offer::create($request->all());
            return response()->json($request, 201);
    }

    public function update(Request $request, $id)
    {
                
                    Offer::find($id)->update($request->all());
                    return response()->json([], 200, []);   
    }

    public function destroy(Request $request, $id)
    {    
            try {
                $offer = Offer::findOrFail($id);
                $offer->delete();
                return response()->json($offer, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
    }    
}
