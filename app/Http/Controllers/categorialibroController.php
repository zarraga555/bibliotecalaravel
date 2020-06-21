<?php

namespace App\Http\Controllers;

use App\Categorialibro;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;

class categorialibroController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index', 'listCategoria', 'show', 'create', 'store', 'edit', 'update', 'destroy');
    }

    public function index (){
        $categoria = Categorialibro::paginate(8);
        return view('categoria', compact('categoria'));
    }

    public function listCategoria(){
        $categoria = Categorialibro::paginate(8);
        return view('categoria.listCategoria', compact('categoria'));
    }

    public function create (){
        return view('categoria.create');
    }

    public function store (CategoriaRequest $request){
        // Categorialibro::create([
        //     'nombre' => request('nombre'),
        //     $request->validated()
        // ]);
        // return redirect()->route('categoria.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $result = Categorialibro::create($request->all());

            if($result){
                return response()->json(['success' => 'true']);
            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function edit ($categorium){
        // return view('categoria.edit', [
        //     'categorium' => $categorium,
        // ] );
        $categorialitem = Categorialibro::find($categorium);
        return response()->json($categorialitem);
    }

    public function update(CategoriaRequest $request, $categorium){
        // $categorium->update([
        //     'nombre' => request('nombre'),
        //     $request->validated()
        // ]);
        // return redirect()->route('categoria.index');

        if($request->ajax()){
            //buscara el id que le mandamos
            $editorial = Categorialibro::FindOrFail($categorium);
            //guardo toda la informacion que me esta mandando
            $input = $request->all();
            //voy a guardar toda la informacion
            $resuelt = $editorial->fill($input)->save();

            if($resuelt){
                return response()->json(['success' => 'true']);
            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function destroy($categorium){
        // $categorialibro->delete();
        // return redirect()->route('categoria.index');
        $editorial = Categorialibro::FindOrFail($categorium);
        $result = $editorial->delete();
        if($result){
            return response()->json(['success' => 'true']);
        }else{
            return response()->json(['success' => 'false']);
        }
    }
}
