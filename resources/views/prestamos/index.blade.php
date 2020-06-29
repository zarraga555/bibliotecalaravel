@extends('layaout')

@section('title','Prestamos')

@section('formulario')
    @if (auth()->check() && auth()->user()->rol == "Estudiante")
    <div class="container">
        <div class="row row2">
            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">Solicita un prestamo de un libro para tus estudios</h1>
                <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, corrupti alias! Dolorem iste quis ex cumque maiores, sequi natus quidem! Tempora quod eligendi officia libero doloremque cum, porro vitae ex!</p>
                <a class="btn btn-lg btn-block btn-primary" href="{{ route('prestamos.create') }}">Reserva tu libro</a>
                <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('libros.index') }}">Buscar libro</a>
            </div>
            <div class="col 12 col-lg-6">
                <img class="img-fluid mb-4" src="/img/studying.svg" alt="">
            </div>
        </div>
    </div>
    @endif
    @guest
    <div class="container">
        <div class="row row2">
            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">Solicita un prestamo de un libro para tus estudios</h1>
                <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, corrupti alias! Dolorem iste quis ex cumque maiores, sequi natus quidem! Tempora quod eligendi officia libero doloremque cum, porro vitae ex!</p>
                <a class="btn btn-lg btn-block btn-primary" href="{{ route('prestamos.create') }}">Reserva tu libro</a>
                <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('libros.index') }}">Buscar libro</a>
            </div>
            <div class="col 12 col-lg-6">
                <img class="img-fluid mb-4" src="/img/studying.svg" alt="">
            </div>
        </div>
    </div>
    @endguest
@endsection

@section('content')
    @if (auth()->check() && auth()->user()->rol == "Administrador" || auth()->check() && auth()->user()->rol == "Asistente")
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 style="align-items: center">Prestamos</h1>

            @if(auth()->check() && auth()->user()->rol == "Administrador" || auth()->check() && auth()->user()->rol == "Asistente")
                <h2><u><a class="btn btn-primary mb-0" href="{{ route('prestamos.create') }}">Crear Nuevo Prestamo</a></u></h2>
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
                        <th scope="col">Tipo prestamo</th>
                        <th scope="col">Fecha prestamo</th>
                        <th scope="col">Fecha devolucion</th>
                        <th scope="col">Libro</th>
                        <th scope="col">Persona</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prestamos as $portItem)
                        <tr>
                            <th scope="row">{{ $portItem->id }}</th>
                            <td>{{ $portItem->tipoPrestamo }}</td>
                            <td>{{ $portItem->fecha_prestamo }}</td>
                            <td>{{ $portItem->fecha_devolucion }}</td>
                            <td>{{ $portItem->idLibro }}</td>
                            <td>{{ $portItem->idPersona }}</td>
                            <td>{{ $portItem->idUsuario }}</td>

                            <td>
                                <a href="{{ route('prestamos.edit', $portItem) }}"
                                    class="btn btn-success" title="Editar"><span class="material-icons">create</span></a>
                                <a href="#" onclick="document.getElementById('delete-prestamo').submit()" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"
                                    title="Borrar"><span class="material-icons">delete</span></a>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="errortable" align="center">No hay Libros registrados</td>
                        </tr>
                    @endforelse
                    <form action="{{route('prestamos.destroy', $portItem ?? '' )}}"
                                id="delete-prestamo"
                                method="POST"
                                class="d-none">
                                @csrf @method('DELETE')
                    </form>
                </tbody>
            </table>
        </div>
       {{-- comment
        {{ $prestamos->links()}}--}}
    </div>
    @endif
@endsection
