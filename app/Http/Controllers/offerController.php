<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class offerController extends Controller
{
   
    public function index()
    {
        //devuelve una respuesta en Json con todos los elementos de la base de datos en estado activo y el status 200. 
        // 0 indica cerrado y 1 abierto
        // @note pensar si es mas optimo devolver todo el contenido de la BBDD y luego con vue mostrar o ocultar  
        return response (Offer::orderBy('estado', 'DESC')->get(), 200);
        
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

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        /*$this->validate($request, [
            'estado' => 'required',
        ]);*/
        Offer::find($id)->update($request->all());
            
        return;
    }

    
    public function destroy($id)
    {
        return response(Offer::all()->where('id',$id) , 201);
    }
}
