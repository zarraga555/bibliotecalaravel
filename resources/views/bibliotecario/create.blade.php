@extends('layaout')

@section('title')
    Crear Bibliotecario
@endsection
@section('formulario')
    <div class="col">
    <h1>@lang('Nuevo Bibliotecario')</h1><br>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('bibliotecario.store') }}">
                @include('bibliotecario._form', ['btnText' => 'Guardar'])
            </form>
        </div>

    </div>
@endsection
