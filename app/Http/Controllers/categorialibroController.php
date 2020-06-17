<?php

namespace App\Http\Controllers;

use App\Categorialibro;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;

class categorialibroController extends Controller
{
    public function index (){
        $categoria = Categorialibro::paginate(8);
        return view('categoria', compact('categoria'));
    }

    public function create (){
        return view('categoria.create');
    }
    public function store (CategoriaRequest $request){
        Categorialibro::create([
            'nombre' => request('nombre'),
            $request->validated()
        ]);
        return redirect()->route('categoria.index');
    }

    public function edit (Categorialibro $categorium){
        return view('categoria.edit', [
            'categorium' => $categorium,
        ] );
    }

    public function update(Categorialibro $categorium, CategoriaRequest $request){
        $categorium->update([
            'nombre' => request('nombre'),
            $request->validated()
        ]);
        return redirect()->route('categoria.index');
    }

    public function destroy(Categorialibro $categorialibro){
        $categorialibro->delete();
        return redirect()->route('categoria.index');
    }
}
