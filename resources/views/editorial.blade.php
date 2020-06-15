@extends('layaout')

@section('title')
    Editoriales

@endsection
@section('formulario')
<div class="col">
    {{-- <h1>{{__('Send Message') }}</h1> --}}
    <h1>@lang('Editoriales')</h1><br>
    <a href=" {{ route('editorial.create') }} " class="btn btn-primary">Nuevo Editrorial</a>
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
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse($editorial as $editorialitem)
                    <td>{{ $editorialitem->id }}</td>
                    <td>{{ $editorialitem->nombre }}</td>
                    <td>
                        <a href="{{ route('editorial.edit', $editorialitem) }}"
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
