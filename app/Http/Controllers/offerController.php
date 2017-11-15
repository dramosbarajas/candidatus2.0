<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class offerController extends Controller
{
   
    public function index(Request $request)
    {
        
        if ($request->isJson()) {
            return Offer::with('candidates')->orderBy('estado', 'DESC')->get();
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
        
    }

    public function countOffers(Request $request)
    {
       
        if ($request->isJson()) {
            $countactives = Offer::where('estado', 1)->count();
            $countclosed = Offer::where('estado', 0)->count();
            return response()
            ->json(['actives' => $countactives, 'closed' => $countclosed]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }

    }

    public function store(\App\Http\Requests\CreateOfferRequest $request)
    {
        
        if ($request->isJson()) {
            Offer::create($request->all());
            return response()->json($request, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }

    }

    public function update(Request $request, $id)
    {
   
        if ($request->isJson()) {
            if($request->estado != '' && is_numeric($request->estado)){
                try {
                    Offer::find($id)->update($request->all());
                    return response()->json([], 200, []);
                } catch (ModelNotFoundException $e) {
            }
                return response()->json(['error' => 'No content or Error content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }

    }

    public function destroy(Request $request, $id)
    {
       
        if ($request->isJson()) {
            try {
                $offer = Offer::findOrFail($id);
                $offer->delete();
                return response()->json($offer, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }

    }    
}
