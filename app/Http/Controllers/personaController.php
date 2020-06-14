<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaRequest;
use App\Persona;
use Illuminate\Http\Request;

class personaController extends Controller
{
    public function Mostrar (){
        $persona = Persona::paginate();

        return view('usuario', compact('persona'));
    }

    public function create (){

        return view('persona.create');
    }

    public function store (CreatePersonaRequest $request){
        Persona::create([
            'ci' => request('ci'),
            'complemento' => request('complemento'),
            'nombre' => request('nombre'),
            'direccion' => request('direccion'),
            'telefono' => request('telefono'),
            'correo' => request('correo'),
            'fechaNacimiento' => request('fechaNacimiento'),
            'paisNacimiento' => request('paisNacimiento'),
            $request->validated()
        ]);
        return redirect()->route('persona.index');
    }

    public function edit (Persona $personaitem){
        return view('persona.edit', [
            'personaitem' => $personaitem,
        ] );
    }

    public function update(Persona $personaitem, CreatePersonaRequest $request){
        $personaitem->update([
            'ci' => request('ci'),
            'complemento' => request('complemento'),
            'nombre' => request('nombre'),
            'direccion' => request('direccion'),
            'telefono' => request('telefono'),
            'correo' => request('correo'),
            'fechaNacimiento' => request('fechaNacimiento'),
            'paisNacimiento' => request('paisNacimiento'),
            $request->validated()
        ]);
        return redirect()->route('persona.index');
    }

    public function destroy(Persona $personaitem){
        $personaitem->delete();
        return redirect()->route('persona.index');
    }
}
