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
        return response (Offer::get(),200);
        
    }

    public function create()
    {
        //
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
        return response($request->all(),201);
    }

    
    public function destroy($id)
    {
        return response(Offer::all()->where('id',$id) , 201);
    }
}
