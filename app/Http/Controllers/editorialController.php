<?php

namespace App\Http\Controllers;

use App\Editorial;
use App\Http\Requests\EditorialRequest;
use Illuminate\Http\Request;

class editorialController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index', 'listEditorial', 'show', 'create', 'store', 'edit', 'update', 'destroy');
        // Este middleware me deja acceder con dos roles
        $this->middleware('role');
    }

    public function index (){
        $editorial = Editorial::paginate(8);
        return view('editorial', compact('editorial'));
    }

    public function listEditorial(){
        $editorial = Editorial::paginate(8);
        return view('editorial.listEditorial', compact('editorial'));
    }

    public function create (){
        return view('editorial.create');
    }
    public function store (EditorialRequest $request){
        // Editorial::create([
        //     'nombre' => request('nombre'),
        //     $request->validated()
        // ]);
        // return redirect()->route('editorial.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $result = Editorial::create($request->all());

            if($result){
                return response()->json(['success' => 'true']);
            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function edit ($editorial){
        // return view('editorial.edit', [
        //     'editorial' => $editorial,
        // ] );
        $editorialitem = Editorial::find($editorial);
        return response()->json($editorialitem);
    }

    public function update(EditorialRequest $request, $id){
        // $editorial->update([
        //     'nombre' => request('nombre'),
        //     $request->validated()
        // ]);
        // return redirect()->route('editorial.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $editorial = Editorial::FindOrFail($id);
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

    public function destroy($id){
        // $editorial->delete();
        // return redirect()->route('editorial.index');
        $editorial = Editorial::FindOrFail($id);
        $result = $editorial->delete();
        if($result){
            return response()->json(['success' => 'true']);
        }else{
            return response()->json(['success' => 'false']);
        }
    }
}
