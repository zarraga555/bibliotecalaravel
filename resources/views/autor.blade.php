@extends('layaout')

@section('title')
    Autores

@endsection
@section('formulario')
<div class="col">
    {{-- <h1>{{__('Send Message') }}</h1> --}}
    <h1>@lang('Autores')</h1><br>
    <a href=" {{ route('autor.create') }} " class="btn btn-primary">Nuevo Autor</a>
    {{-- @if ($errors->any())
@foreach($errors->all() as $error)
            {{ $error }}<br>
    @endforeach
    @endif--}}
</div>

<div class="">
    <table class="table table-responsive table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Nacionalidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse($autor as $autoritem)
                    <td>{{ $autoritem->nombre }}</td>
                    <td>{{ $autoritem->nacionalidad }}</td>
                    <td>
                        <a href="{{ route('autor.edit', $autoritem) }}"
                            class="btn btn-success" title="Editar"><span class="material-icons">create</span></a>
                        <a href="#"
                            class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                    </td>
            </tr>
                @empty
            <tr>
                <td colspan="3" class="errortable" align="center">No hay datos disponibles</td>
            </tr>
                @endforelse
        </tbody>
    </table>

    {{-- {{ bibliotecario->links() }} --}}
</div>
@endsection
