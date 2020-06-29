<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaRequest;
use App\Prestamo;
use App\Libro;
use App\User;
use App\Persona;

use Illuminate\Http\Request;

class prestamoController extends Controller
{
    public function index (Request $request){
        $tipopres = $request->get('name');
        $id = $request->get('code');
        $prestamos = Prestamo::name($tipopres)
        ->id($id)
        ->get();
        return view('prestamos.index', compact('prestamos'));
    }
    public function show(Prestamo $prestamo){
        $prestamo = Prestamo::all();
        return view('prestamos.show',[
            'prestamos' => $prestamo
        ], compact('prestamo'));
    }
    public function create(Prestamo $prestamo){
        $libro = Libro::all();
        $persona = Persona::all();
        $usuario = User::all();
        return view('prestamos.create', [
            'prestamo' => new Prestamo
        ], compact('libro', 'persona', 'usuario'));
    }
    public function store(){
        Prestamo:: create([
            'id' => request('id'),
            'tipoPrestamo' => request('tipoPrestamo'),
            'fecha_prestamo' => request('fecha_prestamo'),
            'fecha_devolucion' => request('fecha_devolucion'),
            'idLibro' => request('idLibro'),
            'idPersona' => request('idPersona'),            
            'idUsuario' => request('idUsuario')
        ]);
        return redirect()->route('prestamos.index');
    }
    public function edit($librosnombre){
        $libros = Libro::findOrFail($librosnombre);
        $editorial = Editorial::all();
        $autor = Autor::all();
        $categoria = Categorialibro::all();
        return view('libros.edit', compact('libros','editorial', 'autor', 'categoria'));
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