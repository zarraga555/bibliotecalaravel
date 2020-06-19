<?php

namespace App\Http\Controllers;

use App\Bibliotecario;
use App\Http\Requests\BibliotecarioRequest;
use Illuminate\Http\Request;

class bibliotecarioController extends Controller
{
    public function index (){
        $bibliotecario = Bibliotecario::paginate(8);
        return view('bibliotecario', compact('bibliotecario'));
    }

    public function create (){
        return view('bibliotecario.create', [
            'bibliotecario' => new Bibliotecario,
        ]);
    }
    public function store (BibliotecarioRequest $request){
        Bibliotecario::create([
            'ci' => request('ci'),
            'complemento' => request('complemento'),
            'nombre' => request('nombre'),
            'direccion' => request('direccion'),
            'telefono' => request('telefono'),
            'correo' => request('correo'),
            'turno' => request('turno'),
            'salario' => request('salario'),
            'fechaNacimiento' => request('fechaNacimiento'),
            'paisNacimiento' => request('paisNacimiento'),
            'sexo' => request('sexo'),
            $request->validated()
        ]);
        return redirect()->route('bibliotecario.index');
    }

    public function edit (Bibliotecario $bibliotecario){
        return view('bibliotecario.edit', [
            'bibliotecario' => $bibliotecario,
        ] );
    }

    public function update(Bibliotecario $bibliotecario, BibliotecarioRequest $request){
        $bibliotecario->update([
            'ci' => request('ci'),
            'complemento' => request('complemento'),
            'nombre' => request('nombre'),
            'direccion' => request('direccion'),
            'telefono' => request('telefono'),
            'correo' => request('correo'),
            'turno' => request('turno'),
            'salario' => request('salario'),
            'fechaNacimiento' => request('fechaNacimiento'),
            'paisNacimiento' => request('paisNacimiento'),
            'sexo' => request('sexo'),
            $request->validated()
        ]);
        return redirect()->route('bibliotecario.index');
    }

    public function destroy(Bibliotecario $bibliotecario){
        $bibliotecario->delete();
        return redirect()->route('bibliotecario.index');
    }
}
