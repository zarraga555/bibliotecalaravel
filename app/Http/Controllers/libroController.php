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
        /*$editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();*/
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
    public function edit($libros){
        $editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();
        return redirect()->route('libros.edit', compact('editorial', 'autor', 'categoria', 'libros'));
    }
    public function update(Libro $libros){
        $libros->update(request()->all());
        return redirect()->route('libros.show');
    }
    public function destroy($id)
    {
        $libros = Libro::findOrFail($id);
        $result = $libros->delete();
        if($result){
            return response()->json(['success' => 'true']);
        }else{
            return response()->json(['success' => 'false']);
        }
    }
}