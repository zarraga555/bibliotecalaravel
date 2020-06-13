@extends('layaout')

@section('title')
Prestamo de Libros

@endsection
@section('formulario')
<div class="col">
    {{-- <h1>{{__('Send Message') }}</h1> --}}
    <h1>@lang('Nuevo Prestamo')</h1><br>
    {{-- @if ($errors->any())
@foreach($errors->all() as $error)
            {{ $error }}<br>
    @endforeach
    @endif--}}
</div>

<div class="row justify-content-md-center">
    <div class="col-md-6">
        <form method="POST" action="{{ route('prestamo') }}">
            @csrf
            <div class="form-group">
                <label for="idLibro">Introduzca el codigo del libro
                </label>
                <input type="text" name="idLibro" class="form-control @error('idLibro') is-invalid @enderror "
                    value="{{ old('idLibro') }}">
                {!! $errors->first('idLibro', '<small>:message</small><br>') !!}
            </div>
            <div class="form-group">
                <label for="idUsuario">Introduzca el ci de la persona</label>
                <input type="text" name="idUsuario" class="form-control @error('idUsuario') is-invalid @enderror "
                    value="{{ old('idUsuario') }}">
                {!! $errors->first('idUsuario', '<small>:message</small><br>') !!}
            </div>
            <div class="form-group">
                <label for="fechaPrestamo">Fecha de Prestamo</label>
                <input type="date" name="fechaPrestamo"
                    class="form-control @error('fechaPrestamo') is-invalid @enderror"
                    value="{{ old('fechaPrestamo') }}">
                {!! $errors->first('fechaPrestamo', '<small>:message</small><br>') !!}
            </div>
            <div class="form-group">
                <label for="fechaDevol">Fecha de Devolucion</label>
                <input type="date" name="fechaDevol" class="form-control @error('fechaDevol') is-invalid @enderror"
                    value="{{ old('fechaDevol') }}">
                {!! $errors->first('fechaDevol', '<small>:message</small><br>') !!}
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
    {{-- Para traducir los mensajes nos dirigiremos, a la carpeta config y abrimos el archivo --}}
    {{-- app.php buscamos la opcion 'locale' => 'en' y la cambiamos a "es" --}}
    {{-- a la carpeta  resources, e ingresamos en la carpeta lang creamos la carpeta "es" --}}
    {{-- y creamos el archivo validation.php --}}
    {{-- para tener todas las traducciones busca en google laravel lang con la version que usas --}}
    {{-- Para realizar traducciones de toda la pagina nos dirigimos a la carpeta resources --}}
    {{-- e ingresamos a la carpeta lang y creamos el archivo es.json --}}
</div>
@endsection
