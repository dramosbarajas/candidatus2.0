<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    public function send_email(Request $request){
        $data = array(
            'nombre' => $request->nombre,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'contenido' => $request->contenido,
            'email'=> $request->email,
        );
        
        
        Mail::send('emails.info', $data, function ($message) use ($data){
            
            $message->from('empresaficticiacandidatus@gmail.com', 'Empresa Ficticia');
    
            $message->to($data['email'])->subject('EMPRESA FICTICIA - Información sobre su candidatura');
    
        });
    
        return response ("Mensaje Enviado", 200);
    }
}
