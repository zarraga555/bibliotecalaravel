@extends('layaout')

@section('title')
Bibliotecarios
@endsection
@section('formulario')
<div class="col">

    <h1>@lang('Bibliotecarios')</h1><br>
    <a href=" {{ route('bibliotecario.create') }} " class="btn btn-primary">Nuevo Bibliotecario</a>
</div>

<div class="">
    <table class="table table-responsive table">
        <thead>
            <tr>
                <th scope="col">CI</th>
                <th scope="col">Complemento</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
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
                    <td>{{ $bibliotecarioitem->direccion }}</td>
                    <td>{{ $bibliotecarioitem->telefono }}</td>
                    <td>{{ $bibliotecarioitem->correo }}</td>
                    <td>{{ $bibliotecarioitem->turno }}</td>
                    <td>{{ $bibliotecarioitem->salario }}</td>
                    <td>
                        <a href="{{ route('bibliotecario.edit', $bibliotecarioitem) }}"
                            class="btn btn-success" title="Editar"><span class="material-icons">create</span></a>
                        <a href="#"
                            class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
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


@extends('bibliotecario.delete')

@endsection

