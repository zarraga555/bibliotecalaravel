<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Http\Requests\AutorRequest;
use Illuminate\Http\Request;

class autorController extends Controller
{
    public function index (){
        // $autor = Autor::paginate(8);
        return view('autor');
    }

    public function listAutor(){
        $autor = Autor::paginate(8);
        return view('autor.listAutor', compact('autor'));
    }

    public function create (){
        return view('autor.create');
    }

    public function store (AutorRequest $request){
        // Autor::create([
        //     'nombre' => request('nombre'),
        //     'nacionalidad' => request('nacionalidad'),
        //     $request->validated()
        // ]);
        // return redirect()->route('autor.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $result = Autor::create($request->all());

            if($result){
                return response()->json(['success' => 'true']);
            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function edit ($autor){
        // return view('autor.edit', [
        //     'autor' => $autor,
        // ] );
        $autoritem = Autor::find($autor);
        return response()->json($autoritem);
    }

    public function update(AutorRequest $request, $id){
        // $autor->update([
        //     'nombre' => request('nombre'),
        //     'nacionalidad' => request('nacionalidad'),
        //     $request->validated()
        // ]);
        // return redirect()->route('autor.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $autor = Autor::FindOrFail($id);
            //guardo toda la informacion que me esta mandando
            $input = $request->all();
            //voy a guardar toda la informacion
            $resuelt = $autor->fill($input)->save();

            if($resuelt){
                return response()->json(['success' => 'true']);
            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function destroy($id){
        $autor = Autor::FindOrFail($id);
        $result = $autor->delete();
        if($result){
            return response()->json(['success' => 'true']);
        }else{
            return response()->json(['success' => 'false']);
        }
        // $autor->delete();
        // return redirect()->route('autor.index');
    }
}
