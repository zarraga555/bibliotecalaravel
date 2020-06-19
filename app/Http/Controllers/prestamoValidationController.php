<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Libro;
use App\Persona;
use App\User;

class prestamoValidationController extends Controller
{
    public function store() {
        $message = request()->validate(
            [
                'idLibro' => 'required',
                'idUsuario' => 'required',
                'fechaPrestamo' => 'required',
                'fechaDevol' => 'required',
            ],
            [
                //Mensajes Prersonalizados
                'idLibro.required' => 'Necesito el codigo del libro',
                'idUsuario.required' => 'Necesito el numero de documento de la persona',
                'fechaPrestamo.required' => 'Necesito la fecha de prestamo del libro',
                'fechaDevol.required' => 'Necesito la fecha de devolucion del libro',
            ]
        );
        return $message;
    }
}
