<?php

namespace App\Http\Controllers;

use App\Editorial;
use App\Http\Requests\EditorialRequest;
use Illuminate\Http\Request;

class editorialController extends Controller
{
    public function index (){
        $editorial = Editorial::paginate(8);
        return view('editorial', compact('editorial'));
    }

    public function create (){
        return view('editorial.create');
    }
    public function store (EditorialRequest $request){
        Editorial::create([
            'nombre' => request('nombre'),
            $request->validated()
        ]);
        return redirect()->route('editorial.index');
    }

    public function edit (Editorial $editorial){
        return view('editorial.edit', [
            'editorial' => $editorial,
        ] );
    }

    public function update(Editorial $editorial, EditorialRequest $request){
        $editorial->update([
            'nombre' => request('nombre'),
            $request->validated()
        ]);
        return redirect()->route('editorial.index');
    }

    public function destroy(Editorial $editorial){
        $editorial->delete();
        return redirect()->route('editorial.index');
    }
}
