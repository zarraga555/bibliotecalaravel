<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class libroValidationController extends Controller
{
    public function store() {
        $message = request()->validate(
            [
                'codigoLibro' => 'required',
                'nombre' => 'required',
                'editorial' => 'required',
                'paginas' => 'required',
            ],
            [
                //Mensajes Prersonalizados
                'codigoLibro.required' => 'Necesito el codigo del libro',
                'nombre.required' => 'Necesito el nombre del libro',
                'editorial.required' => 'Necesito el nombre de la editorial',
                'paginas.required' => 'Necesito la cantidad de paginas del libro'

            ]
        );
        return $message;
    }
}
