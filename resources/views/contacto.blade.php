@extends('layaout')

@section('title')
    Contacto
@endsection

@section('formulario')
<div class="container">
    @if (session('status'))
        <h1>{{ session('status') }}</h1>
    @else
    <div class="row justify-content-md-center">
        <h1>Envia un mensaje</h1>
    </div>
    <br><br>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('contacto') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Completo</label>
                    <input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
                    {!! $errors->first('nombre', '<small>:message</small><br>') !!}
                </div>
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <input class="form-control" type="text" name="email" value=" {{ old('email') }} ">
                    {!! $errors->first('email', '<small>:message</small><br>') !!}
                </div>
                <div class="form-group">
                    <label for="asunto">Asunto</label>
                    <input class="form-control" type="subjet" name="asunto" value=" {{ old('asunto') }} ">
                    {!! $errors->first('asunto', '<small>:message</small><br>') !!}
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea class="form-control" name="mensaje" rows="3">{{ old('contenido') }}</textarea>
                    {!! $errors->first('mensaje', '<small>:message</small><br>') !!}
                </div>
                <button class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
    @endif
</div>

    {{-- Para traducir los mensajes nos dirigiremos, a la carpeta config y abrimos el archivo --}}
    {{-- app.php buscamos la opcion 'locale' => 'en' y la cambiamos a "es" --}}
    {{-- a la carpeta  resources, e ingresamos en la carpeta lang creamos la carpeta "es"  --}}
    {{-- y creamos el archivo validation.php --}}
    {{-- para tener todas las traducciones busca en google laravel lang con la version que usas --}}
    {{-- Para realizar traducciones de toda la pagina nos dirigimos a la carpeta resources  --}}
    {{-- e ingresamos a la carpeta lang y creamos el archivo es.json  --}}
@endsection

