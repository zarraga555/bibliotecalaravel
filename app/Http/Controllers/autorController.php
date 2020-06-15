<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Http\Requests\AutorRequest;
use Illuminate\Http\Request;

class autorController extends Controller
{
    public function index (){
        $autor = Autor::paginate(8);
        return view('autor', compact('autor'));
    }

    public function create (){
        return view('autor.create');
    }
    public function store (AutorRequest $request){
        Autor::create([
            'nombre' => request('nombre'),
            'nacionalidad' => request('nacionalidad'),
            $request->validated()
        ]);
        return redirect()->route('autor.index');
    }

    public function edit (Autor $autor){
        return view('autor.edit', [
            'autor' => $autor,
        ] );
    }

    public function update(Autor $autor, AutorRequest $request){
        $autor->update([
            'nombre' => request('nombre'),
            'nacionalidad' => request('nacionalidad'),
            $request->validated()
        ]);
        return redirect()->route('autor.index');
    }

    public function destroy(Autor $autor){
        $autor->delete();
        return redirect()->route('autor.index');
    }
}
