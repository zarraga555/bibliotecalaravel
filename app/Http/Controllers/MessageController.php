<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(/*Request $request*/)
        {
            // return 'Procesar el formulario';
            // return $request;
            // return $request->get('nombre');
            // return request('email');
            $message = request()->validate(
                [
                    'nombre' => 'required',
                    'email' => 'required|email',
                    'asunto' => 'required',
                    'mensaje' => 'required|min:4'
                ],
                [
                    //Mensajes Prersonalizados
                    'nombre.required' => 'Necesito tu nombre',
                ]
            );
            // Para mandar email lo primero lo que debemos hacer es abrir la terminal
            // y escribir el comando php artisan make:mail [Le damos un nombre]S
            Mail::to('zarraga555@gmail.com')->queue(new MessageReceived($message));
            //es mejor usar queue ya que trabaja en segundo plano
            //Lo que hace back() es redireccionarte al mismo view que estas
            return back()->with('status', 'Tu mensaje ha sido enviado, te contactaremos pronto');
        }
}
