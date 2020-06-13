<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuarioValidationController extends Controller
{
    public function store() {
        $message = request()->validate(
            [
                'ci' => 'required',
                'nombre' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'correo' => 'required|email',
                'fechaNacimiento' => 'required',
                'paisNacimiento' => 'required',

            ],
            [
                //Mensajes Prersonalizados
                'ci.required' => 'Necesito el numero de documento',
                'nombre.required' => 'Necesito el nombre de la persona',
                'direccion.required' => 'Necesito el direccion de la persona',
                'telefono.required' => 'Necesito el telefono de la persona',
                'correo.required' => 'Necesito el email de la persona',
                'fechaNacimiento.required' => 'Necesito la fecha de nacimiento',
                'paisNacimiento.required' => 'Necesito la nacionalidad',
            ]
        );
        return $message;
    }
}
