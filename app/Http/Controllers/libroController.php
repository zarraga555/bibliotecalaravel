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
    public function index (Request $request){
        $name = $request->get('name');
        $codigoLibro = $request->get('code');
        $libros = Libro::name($name)
        ->codigoLibro($codigoLibro)
        ->get();
        return view('libros.index', compact('libros'));
        /*$libros = Libro::all();
        return view('libros.index', [
            'libros' => Libro::latest()->paginate()
        ], compact('libros'));*/
    }
    /*public function show(Libro $libro){
        $libro = Libro::all();
        return view('libros.show',[
            'libros' => $libro
        ], compact('libro'));
    }*/
    public function create(Libro $libros){
        $editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();
        return view('libros.create', [
            'libro' => new Libro
        ], compact('editorial', 'autor', 'categoria'));
    }
    public function store(){
        Libro:: create([
            'codigoLibro' => request('codigoLibro'),
            'nombre' => request('nombres'),
            'paginas' => request('paginas'),
            'fecha_lanzamiento' => request('fecha'),
            'idAutor' => request('autor'),
            'ideditorial' => request('editorial'),            
            'idCategoriaLibro' => request('categoria_libro_id')
        ]);
        return redirect()->route('libros.index');
    }
    public function edit(Libro $libros){
        $editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();
        return view('libros.edit',['libros' => $libros], compact('editorial','autor','categoria'));
    }
    public function update(Libro $libros){
        $libros->update(request()->all());
        return redirect()->route('libros.index', $libros);
    }
    public function destroy(Libro $libros)
    {
        $libros->delete();
        
        return redirect()->route('libros.index');
    }
}