<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaRequest;
use App\Persona;
use Illuminate\Http\Request;

class personaController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index', 'listPersona', 'show', 'create', 'store', 'edit', 'update', 'destroy');
    }

    public function index (){
        $persona = Persona::paginate();
        return view('persona', compact('persona'));
    }

    public function listPersona(){
        $persona = Persona::paginate(8);
        return view('persona.listPersona', compact('persona'));
    }

    public function create (){
        return view('persona.create');
    }

    public function store (CreatePersonaRequest $request){
        // Persona::create([
        //     'ci' => request('ci'),
        //     'complemento' => request('complemento'),
        //     'nombre' => request('nombre'),
        //     'direccion' => request('direccion'),
        //     'telefono' => request('telefono'),
        //     'correo' => request('correo'),
        //     'fechaNacimiento' => request('fechaNacimiento'),
        //     'paisNacimiento' => request('paisNacimiento'),
        //     $request->validated()
        // ]);
        // return redirect()->route('persona.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $result = Persona::create($request->all());

            if($result){
                return response()->json(['success' => 'true']);
            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function edit ($persona){
        // return view('persona.edit', [
        //     'personaitem' => $personaitem,
        // ] );
        $personaitem = Persona::find($persona);
        return response()->json($personaitem);
    }

    public function update(CreatePersonaRequest $request, $persona){
        // $personaitem->update([
        //     'ci' => request('ci'),
        //     'complemento' => request('complemento'),
        //     'nombre' => request('nombre'),
        //     'direccion' => request('direccion'),
        //     'telefono' => request('telefono'),
        //     'correo' => request('correo'),
        //     'fechaNacimiento' => request('fechaNacimiento'),
        //     'paisNacimiento' => request('paisNacimiento'),
        //     $request->validated()
        // ]);
        // return redirect()->route('persona.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $personaitem = Persona::FindOrFail($persona);
            //guardo toda la informacion que me esta mandando
            $input = $request->all();
            //voy a guardar toda la informacion
            $resuelt = $personaitem->fill($input)->save();

            if($resuelt){
                return response()->json(['success' => 'true']);
            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function destroy($persona){
        // $personaitem->delete();
        // return redirect()->route('persona.index');
        $personaitem = Persona::FindOrFail($persona);
        $result = $personaitem->delete();
        if($result){
            return response()->json(['success' => 'true']);
        }else{
            return response()->json(['success' => 'false']);
        }
    }
}
