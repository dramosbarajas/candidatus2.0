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
        return response (Offer::get() -> where ('estado', 0) , 200);
        
    }

    public function create()
    {
        //
    }

    
    public function store(\App\Http\Requests\CreateOfferRequest $request)
    {
        /*$this->validate($request, [
            'estado' => 'required',
            'fecha' => 'required',
            'titulo' => 'string|required|max:30|min:6',
            'descripcion' => 'string|required|min:100|max:600', 
            'departamento' => 'required', 
            'estudios' => 'required', 
            'experiencia' => 'required', 
            'contrato' => 'required', 
            'duracion' => 
            array(
                'required',
                'regex:/([0-9]){1,2}/'
            ),
            'jornada' => 'required', 
            'bandamin' => 
            array(
                'required',
                'regex:/([0-9]){4,5}/'
            ),
            'bandamax' => 
            array(
                'required',
                'regex:/([0-9]){4,5}/'
            ),
            'vacante' => 
            array(
                'required',
                'regex:/([0-9]){1,2}/'
            ),
        ]);*/
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
