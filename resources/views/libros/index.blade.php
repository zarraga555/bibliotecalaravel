@extends('layaout')

@section('title','Libros')

@section('formulario')

    @if (auth()->check() && auth()->user()->rol == "Estudiante")
        <div class="container">
            <div class="row row2">
                <div class="col-12 col-lg-6">
                    <h1 class="display-4 text-primary">Encuentra los libros que necesitas</h1>
                    <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, corrupti
                        alias! Dolorem iste quis ex cumque maiores, sequi natus quidem! Tempora quod eligendi officia libero
                        doloremque cum, porro vitae ex!</p>
                </div>
                <div class="col 12 col-lg-6">
                    <img class="img-fluid mb-4" src="/img/book.svg" alt="">
                </div>
                <div class="col 12 col-lg-6 circle">
                    {{-- <i class="fa fa-angle-down" aria-hidden="true"></i> --}}
                    <i class="far fa-chevron-down" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    @endif
    @guest
    <div class="container">
        <div class="row row2">
            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">Encuentra los libros que necesitas</h1>
                <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, corrupti
                    alias! Dolorem iste quis ex cumque maiores, sequi natus quidem! Tempora quod eligendi officia libero
                    doloremque cum, porro vitae ex!</p>
            </div>
            <div class="col 12 col-lg-6">
                <img class="img-fluid mb-4" src="/img/book.svg" alt="">
            </div>
        </div>
        <div class="col 12 col-lg-6 circle">
            {{-- <i class="fa fa-angle-down" aria-hidden="true"></i> --}}
            <i class="far fa-chevron-down" aria-hidden="true"></i>
        </div>
    </div>
    @endguest
@endsection
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 style="align-items: center">Libros</h1>
            @if(auth()->check() && auth()->user()->rol == "Administrador" || auth()->check() && auth()->user()->rol == "Asistente")
                <h2><u><a class="btn btn-primary mb-0" href="{{ route('libros.create') }}">Crear Nuevo Libro</a></u></h2>
            @endif
        </div>
        <nav class="navbar navbar-light float-right">
            <form class="form-inline" method="GET">

                    <input name="name" id="name" class="form-control mr-sm-2" type="search" placeholder="Busqueda por nombre" aria-label="Search">
                    <input name="code" id="code" class="form-control mr-sm-2" type="search" placeholder="Busqueda por codigo" aria-label="Search">

                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>
        <div id="divTable">
            <table class="table table-striped table-dark ">
                <thead>
                    <tr style="color: black" class="table-primary">
                        <th scope="col">Codigo libro</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Paginas</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Num. paginas</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($libros as $portItem)
                        <tr>
                            <th scope="row">{{ $portItem->codigoLibro }}</th>
                            <td>{{ $portItem->nombre }}</td>
                            <td>{{ $portItem->paginas }}</td>
                            <td>{{ $portItem->idEditorial }}</td>
                            <td>{{ $portItem->idAutor }}</td>
                            <td>{{ $portItem->fecha_lanzamiento }}</td>
                            <td>{{ $portItem->idCategoriaLibro }}</td>

                            <td>
                                <a href="{{ route('libros.edit', $portItem) }}"
                                    class="btn btn-success" title="Editar"><span class="material-icons">create</span></a>
                                <a href="#" onclick="document.getElementById('delete-libro').submit()" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"
                                    title="Borrar"><span class="material-icons">delete</span></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="errortable" align="center">No hay Libros registrados</td>
                        </tr>
                    @endforelse
                    <form action="{{route('libros.destroy',  $portItem ?? '' )}}"
                                 id="delete-libro"
                                 method="POST"
                                 class="d-none">
                                 @csrf @method('DELETE')
                            </form>
                </tbody>
            </table>
        </div>
        {{-- comment
        {{ $libros->links() }}--}}
    </div>
@endsection
