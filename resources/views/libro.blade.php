@extends('layaout')

@section('title')
    Libros

@endsection
@section('formulario')
    <div class="col">
    {{-- <h1>{{__('Send Message')}}</h1> --}}
    <h1>@lang('Nuevo Libro')</h1><br>
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endif --}}
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('libro.store') }}">
                @csrf
                <div class="form-group">
                    <label for="codigoLibro">Codigo Libro</label>
                    <input type="text" name="codigoLibro" class="form-control @error('codigoLibro') is-invalid @enderror " value="{{ old('codigoLibro') }}">
                    {!! $errors->first('codigoLibro', '<small>:message</small><br>') !!}
                </div>
                <div class="form-group">
                    <label for="nombre">Titulo del libro</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}">
                    {!! $errors->first('nombre', '<small>:message</small><br>') !!}
                </div>
                <div class="form-group">
                    <label for="editorial">Editorial</label>
                    <input type="text" name="editorial" class="form-control @error('editorial') is-invalid @enderror " value="{{ old('editorial') }}">
                    {!! $errors->first('editorial', '<small>:message</small><br>') !!}
                </div>
                <div class="form-group">
                    <label for="paginas">Numero de Paginas</label>
                    <input type="number" name="paginas" class="form-control @error('paginas') is-invalid @enderror " value="{{ old('paginas') }}">
                    {!! $errors->first('paginas', '<small>:message</small><br>') !!}
                </div>
                <div class="form-group">
                    <label for="paginas">Autor</label>
                    <input type="textr" name="autor" class="form-control @error('paginas') is-invalid @enderror " value="{{ old('autor') }}">
                    {!! $errors->first('autor', '<small>:message</small><br>') !!}
                </div>
                <div class="form-group">
                    <label for="paginas">Categoria</label>
                    <input type="text" name="categorias" class="form-control @error('paginas') is-invalid @enderror " value="{{ old('categorias') }}">
                    {!! $errors->first('categorias', '<small>:message</small><br>') !!}
                </div>
                <button class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection