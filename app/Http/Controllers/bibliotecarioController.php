<?php

namespace App\Http\Controllers;

use App\Bibliotecario;
use App\Http\Requests\BibliotecarioRequest;
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
            $request->validated()
        ]);
        return redirect()->route('bibliotecario.index');
    }

    public function edit (Bibliotecario $bibliotecarioitem){
        return view('bibliotecario.edit', [
            'bibliotecarioitem' => $bibliotecarioitem,
        ] );
    }

    public function update(Bibliotecario $bibliotecarioitem, BibliotecarioRequest $request){
        $bibliotecarioitem->update([
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
            $request->validated()
        ]);
        return redirect()->route('bibliotecario.index');
    }

    public function destroy(Bibliotecario $bibliotecarioitem){
        $bibliotecarioitem->delete();
        return redirect()->route('bibliotecario.index');
    }
}
