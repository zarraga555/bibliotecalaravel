@extends('layaout')

@section('title')
    Editar Bibliotecario
@endsection
@section('formulario')
    <div class="col">
    <h1>@lang('Editar Bibliotecario')</h1><br>
    </div>


    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('bibliotecario.update', $bibliotecario) }}">
                @method('PATCH')
                @include('bibliotecario._form', ['btnText' => 'Guardar Cambios'])
            </form>
        </div>
    {{-- Para traducir los mensajes nos dirigiremos, a la carpeta config y abrimos el archivo --}}
    {{-- app.php buscamos la opcion 'locale' => 'en' y la cambiamos a "es" --}}
    {{-- a la carpeta  resources, e ingresamos en la carpeta lang creamos la carpeta "es"  --}}
    {{-- y creamos el archivo validation.php --}}
    {{-- para tener todas las traducciones busca en google laravel lang con la version que usas --}}
    {{-- Para realizar traducciones de toda la pagina nos dirigimos a la carpeta resources  --}}
    {{-- e ingresamos a la carpeta lang y creamos el archivo es.json  --}}
    </div>
@endsection
