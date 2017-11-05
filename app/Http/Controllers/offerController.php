<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class offerController extends Controller
{
   
    public function index()
    {
        return response (Offer::orderBy('estado', 'DESC')->get(), 200);
        //return Offer::with('candidates')->get();
            
    
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
        return;
    }

    public function show($id)
    {
        return response ( Offer::get() -> where ('id', $id), 200);
    }

    public function update(Request $request, $id)
    {
        
        Offer::find($id)->update($request->all());
        return;
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return (204);
    }
}
