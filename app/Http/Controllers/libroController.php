<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaRequest;
use App\Libro;
use App\Editorial;
use App\Autor;
use App\Categorialibro;

use Illuminate\Http\Request;

class libroController extends Controller
{
    public function index (){
        $libros = Libro::all();
        return view('libros.index', [
            'libros' => Libro::latest()->paginate()
        ], compact('libros'));
    }
    public function show(Libro $libro){
        $libro = Libro::all();
        return view('libros.show',[
            'libros' => $libro
        ], compact('libro'));
    }
    public function create(Libro $libros){
        $editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();
        return view('libros.create', [
            'libro' => new Libro
        ], compact('editorial', 'autor', 'categoria'));
    }
    public function store(){
        $editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();
        Libro:: create([
            'codigoLibro' => request('codigoLibro'),
            'nombre' => request('nombre'),
            'idEditorial' => request('idEditorial'),
            'paginas' => request('paginas'),
            'autor' => request('autor'),
            'idCategoria' => request('idCategoria')
        ]);
        return redirect()->route('libros.index', compact('editorial', 'autor', 'categoria'));
    }
    public function edit(){
        $editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();
        return redirect()->route('libros', compact('editorial', 'autor', 'categoria'));
    }
    public function update(){
        $libro->update(request()->all());
        return redirect()->route('libros.show', $libro);
    }
}