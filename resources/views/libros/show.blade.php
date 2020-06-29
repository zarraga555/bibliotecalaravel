@extends('layaout')

@section('title','lista Libros ')

@section('formulario')

<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <h2 class="list-group-item list-group-item-action">Datos</h2>
        <p class="list-group-item list-group-item list-group-item-dark">{{ $libros->codigoLibro }}</p>
        <p class="list-group-item list-group-item list-group-item-dark">{{ $libros->nombre }}</p>
        <p class="list-group-item list-group-item list-group-item-dark">{{$libros ->paginas}}</p>
        <p class="list-group-item list-group-item list-group-item-dark">{{$libros ->fecha_lanzamiento}}</p>
        <p class="list-group-item list-group-item list-group-item-dark">{{$libros ->idAutor}}</p>
        <p class="list-group-item list-group-item list-group-item-dark">{{$libros ->ideditorial}}</p>
        <p class="list-group-item list-group-item list-group-item-dark">{{$libros ->idCategoriaLibro}}</p>

        <div class="d-flex justify-content-between
            align-items-center">        
            <a href="{{route('libros.index')}}">
                Regresar
            </a>
        </div> 
    </div>
</div>
@endsection