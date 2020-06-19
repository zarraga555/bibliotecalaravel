@extends('layaout')

@section('title')
Bibliotecarios
@endsection
@section('formulario')

<div class="container py-5">
    {{-- <div class="row">
        <div class="col-12 col-lg-6">
            <h1 class="display-4 text-primary">Biblioteca</h1>
            <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, corrupti alias! Dolorem iste quis ex cumque maiores, sequi natus quidem! Tempora quod eligendi officia libero doloremque cum, porro vitae ex!</p>
            <a class="btn btn-lg btn-block btn-primary" href="{{ route('libro') }}">Libros Disponibles</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('prestamo') }}">Reserva tu libro</a>
        </div>
        <div class="col 12 col-lg-6">
            <img class="img-fluid mb-4" src="/img/biblioteca.svg" alt="">
        </div>
    </div> --}}

    <div class="col-12">
        <h1>@lang('Bibliotecarios')</h1><br>
        <a href=" {{ route('bibliotecario.create') }} " class="btn btn-primary">Nuevo Bibliotecario</a>
    </div>

    <div class="row my-5 d-flex justify-content-center">
        <div class="col-12">
            <table class="table table-responsive table">
                <thead>
                    <tr>
                        <th scope="col">CI</th>
                        <th scope="col">Compl.</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Turno</th>
                        <th scope="col">Salario Bs</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @forelse($bibliotecario as $bibliotecarioitem)
                            <td>{{ $bibliotecarioitem->ci }}</td>
                            <td>{{ $bibliotecarioitem->complemento }}</td>
                            <td>{{ $bibliotecarioitem->nombre }}</td>
                            <td>{{ $bibliotecarioitem->correo }}</td>
                            <td>{{ $bibliotecarioitem->turno }}</td>
                            <td>{{ $bibliotecarioitem->salario }}</td>
                            <td>
                                <a href=" {{ route('bibliotecario.show', $bibliotecarioitem) }} " class="btn btn-info"" title="Ver"><span class="material-icons">visibility</span></a>
                                <a href="{{ route('bibliotecario.edit', $bibliotecarioitem) }}" class="btn btn-success" title="Editar"><span class="material-icons">create</span></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                            </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="errortable" align="center">No hay datos disponibles</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $bibliotecario->links() }}
        </div>
    </div>
</div>

@extends('bibliotecario.delete')

@endsection
