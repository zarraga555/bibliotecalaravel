<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class autorValidationController extends Controller
{
    public function store() {
        $message = request()->validate(
            [
                'nombre' => 'required',
                'nacionalidad' => 'required',
            ],
            [
                //Mensajes Prersonalizados
                'nombre.required' => 'Necesito el nombre del autor',
                'nacionalidad.required' => 'Necesito la nacionalidad del autor',
            ]
        );
        return $message;
    }
}
