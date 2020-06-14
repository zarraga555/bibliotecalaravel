<?php

namespace App\Http\Controllers;

use App\Bibliotecario;
use Illuminate\Http\Request;

class bibliotecarioController extends Controller
{
    public function Mostrar (){
        $bibliotecario = Bibliotecario::first()->paginate();
        return view('bibliotecario', compact('bibliotecario'));
    }

    public function create (){
        return view('bibliotecario.create');
    }

}
