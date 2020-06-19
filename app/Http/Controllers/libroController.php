<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaRequest;
use App\Libro;

use Illuminate\Http\Request;

class libroController extends Controller
{
    public function index (){
        $libro = Libro::all();
        return view('home', [
            'libro' => Libro::latest()->paginate()
        ], compact('libro'));
    }
    public function create(){
        $libro = Libro::all();
        $editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();
        return view('home', [
            'libro' => new tipoLibro
        ], compact('libro'));
    }
    public function store(){
        tipoLibro:: create([
            'codigoLibro' => request('codigoLibro'),
            'nombre' => request('nombre'),
            'idEditorial' => request('idEditorial'),
            'paginas' => request('paginas'),
            'autor' => request('autor'),
            'idCategoria' => request('idCategoria')
        ]);
    }
}