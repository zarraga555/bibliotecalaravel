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
    public function create(Prestamo $prestamos){
        $libro = Libro::all();
        $persona = Persona::all();
        $usuario = User::all();
        return view('prestamos.create', [
            'prestamos' => new Prestamo
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
    public function edit(Prestamo $prestamos){
        $libro = Libro::all();
        $persona = Persona::all();
        $usuario = User::all();
        return view('prestamos.edit',['prestamos' => $prestamos], compact('libro','persona','usuario'));
    }
    public function update(Prestamo $prestamos){
        $prestamos->update(request()->all());
        return redirect()->route('prestamos.index', $prestamos);
    }
    public function destroy(Prestamo $prestamos)
    {
        $prestamos->delete();
        
        return redirect()->route('prestamos.index');
    }
}