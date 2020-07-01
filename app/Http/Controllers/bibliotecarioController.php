<?php

namespace App\Http\Controllers;

use App\Bibliotecario;
use App\DB;
use App\Http\Requests\BibliotecarioRequest;
use Illuminate\Http\Request;

class bibliotecarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index','listBibliotecario' , 'show', 'create', 'store', 'edit', 'update', 'destroy');
        // Este middleware me deja acceder con dos roles
        //$this->middleware('role');
        //Este middleware me deja acceder como Admin
        $this->middleware('Administrador');
        // $this->middleware('Asistente')->except('index', 'listBibliotecario', 'edit');
        // $this->middleware('Estudiante')->only('index','listBibliotecario' , 'show', 'create', 'store', 'edit', 'update', 'destroy');

    }

    public function index (){
        $bibliotecario = Bibliotecario::paginate(8);
        return view('bibliotecario', compact('bibliotecario'));
    }

    public function listBibliotecario(){
        $bibliotecario = Bibliotecario::paginate(8);
        return view('bibliotecario.listBibliotecario', compact('bibliotecario'));
    }

    public function search (Request $request){
        if($request->ajax()){
            $salida = "";
            $search = $request->get('search');
            $ci = $request->get('ci');
            if($search !=""){
                $data = Bibliotecario::where('nombre', 'LIKE', '%' .$search. '%')->get();
            }elseif($ci !=""){
                $data = Bibliotecario::where('ci', 'LIKE',  $ci. '%')->get();
            }

            // $data = Bibliotecario::where('nombre', 'LIKE', '%' .$search. '%')
            //         ->orWhere('ci', 'LIKE', '%' .$ci. '%')->get();
            if($data){
                foreach($data as $datas){
                    $salida .= '<tr>
                                <td>' .$datas->ci. '</td>
                                <td>' .$datas->complemento. '</td>
                                <td>' .$datas->nombre. '</td>
                                <td>' .$datas->correo. '</td>
                                <td>' .$datas->turno. '</td>
                                <td>' .$datas->salario. '</td>
                                <td>'.
                                    '<a href="#" onclick="Ver('.$datas->id.')" class="btn btnT btn-info" title="Ver" data-toggle="modal" data-target="#ShowModal"><span class="material-icons">visibility</span></a>
                                    <a href="#" onclick="Mostrar('.$datas->id.') " class="btn btnT btn-success" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                                    <a href="#" onclick="Eliminar('.$datas->id.') " class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                                    '.
                                '</td>'.
                                '</tr>
                                ';
                }
                return response($salida);
            }else{
                return response()->json(['false' => 'No hay registros']);
            }
        }
    }

    public function show(Bibliotecario $bibliotecario){
        return view('bibliotecario.show', [
            'bibliotecario' => $bibliotecario
        ]);
    }

    public function create (){
        return view('bibliotecario.create', [
            'bibliotecario' => new Bibliotecario,
        ]);
    }
    public function store (BibliotecarioRequest $request){
        // Bibliotecario::create([
        //     'ci' => request('ci'),
        //     'complemento' => request('complemento'),
        //     'nombre' => request('nombre'),
        //     'direccion' => request('direccion'),
        //     'telefono' => request('telefono'),
        //     'correo' => request('correo'),
        //     'turno' => request('turno'),
        //     'salario' => request('salario'),
        //     'fechaNacimiento' => request('fechaNacimiento'),
        //     'paisNacimiento' => request('paisNacimiento'),
        //     'sexo' => request('sexo'),
        //     $request->validated()
        // ]);
        // return redirect()->route('bibliotecario.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $result = Bibliotecario::create($request->all());

            if($result){
                return response()->json(['success' => 'true']);

            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function edit ($bibliotecario){
        // return view('bibliotecario.edit', [
        //     'bibliotecario' => $bibliotecario,
        // ] );
        $bibliotecarioitem = Bibliotecario::find($bibliotecario);
        return response()->json($bibliotecarioitem);
    }

    public function update(BibliotecarioRequest $request, $bibliotecario){
        // $bibliotecario->update([
        //     'ci' => request('ci'),
        //     'complemento' => request('complemento'),
        //     'nombre' => request('nombre'),
        //     'direccion' => request('direccion'),
        //     'telefono' => request('telefono'),
        //     'correo' => request('correo'),
        //     'turno' => request('turno'),
        //     'salario' => request('salario'),
        //     'fechaNacimiento' => request('fechaNacimiento'),
        //     'paisNacimiento' => request('paisNacimiento'),
        //     'sexo' => request('sexo'),
        //     $request->validated()

        // ]);
        // return redirect()->route('bibliotecario.index');
        if($request->ajax()){
            //buscara el id que le mandamos
            $bibliotecarioitem = Bibliotecario::FindOrFail($bibliotecario);
            //guardo toda la informacion que me esta mandando
            $input = $request->all();
            //voy a guardar toda la informacion
            $resuelt = $bibliotecarioitem->fill($input)->save();

            if($resuelt){
                return response()->json(['success' => 'true']);
            }else{
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function destroy( $bibliotecario){
        // $bibliotecario->delete();
        // return redirect()->route('bibliotecario.index');
        $bibliotecarioitem = Bibliotecario::FindOrFail($bibliotecario);
        $result = $bibliotecarioitem->delete();
        if($result){
            return response()->json(['success' => 'true']);
        }else{
            return response()->json(['success' => 'false']);
        }
    }
}
