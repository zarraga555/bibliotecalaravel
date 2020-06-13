@extends('layaout')

@section('title')
Bibliotecarios

@endsection
@section('formulario')
<div class="col">
    {{-- <h1>{{__('Send Message') }}</h1> --}}
    <h1>@lang('Bibliotecarios')</h1><br>
    <a href=" {{ route('bibliotecario.create') }} " class="btn btn-primary">Nuevo Bibliotecario</a>
    {{-- @if ($errors->any())
@foreach($errors->all() as $error)
            {{ $error }}<br>
    @endforeach
    @endif--}}
</div>

<div class="row justify-content-md-center">
    <table class="table table-responsive table">
        <thead>
            <tr>
                <th scope="col">CI</th>
                <th scope="col">Complemento</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Direecion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Nacionalidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse($persona as $personaitem)
                    <td>{{ $personaitem->ci }}</td>
                    <td>{{ $personaitem->complemento }}</td>
                    <td>{{ $personaitem->nombre }}</td>
                    <td>{{ $personaitem->direccion }}</td>
                    <td>{{ $personaitem->telefono }}</td>
                    <td>{{ $personaitem->correo }}</td>
                    <td>{{ $personaitem->fechaNacimiento }}</td>
                    <td>{{ $personaitem->paisNacimiento }}</td>
                    <td>
                        <a href="{{ route('persona.edit', $personaitem) }}"
                            class="btn btn-success" title="Editar"><span class="material-icons">create</span></a>
                        <a href=""
                            class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                    </td>
            </tr>
        @empty
            <span>No hay datos disponibles</span>
            @endforelse
        </tbody>
    </table>
</div>


<!-- MODAL DE ELIMINADO LOGICO-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Elimnar Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('persona.destroy', $personaitem) }}">
                @csrf @method('DELETE')
                <div class="modal-body">
                    ¿Estas seguro que deseas elimar la persona?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger btn-danger">Eliminar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- FINAL DEL MODAL DE ELIMINADO LOGICO-->


{{-- Para traducir los mensajes nos dirigiremos, a la carpeta config y abrimos el archivo --}}
{{-- app.php buscamos la opcion 'locale' => 'en' y la cambiamos a "es" --}}
{{-- a la carpeta  resources, e ingresamos en la carpeta lang creamos la carpeta "es" --}}
{{-- y creamos el archivo validation.php --}}
{{-- para tener todas las traducciones busca en google laravel lang con la version que usas --}}
{{-- Para realizar traducciones de toda la pagina nos dirigimos a la carpeta resources --}}
{{-- e ingresamos a la carpeta lang y creamos el archivo es.json --}}

@endsection
