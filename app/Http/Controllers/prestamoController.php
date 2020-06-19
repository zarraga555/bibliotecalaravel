<?php

namespace App\Http\Controllers;

use App\Prestamo;
use Illuminate\Http\Request;

class prestamoController extends Controller
{
    public function index (){
        $prestamo = Prestamo::paginate(8);
        return view('prestamo', compact('prestamo'));
    }
    public function create (){
        return view('prestamo.create', [
            'prestamo' => new Prestamo(),
        ]);
    }
}
