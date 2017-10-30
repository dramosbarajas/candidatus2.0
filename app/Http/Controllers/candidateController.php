<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
class candidateController extends Controller
{
    
    public function index()
    {
        return "get candidate";
    }

    
    public function store(Request $request)
    {
        Candidate::create($request->all());
        return ($request->all());
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
