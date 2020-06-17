@extends('layaout')

@section('title')
    Crear Clientes
@endsection
@section('formulario')
    <div class="col">
        <h1>@lang('Nuevo Persona')</h1><br>
    </div>


    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('persona.store') }}">
                @csrf
                @include('persona._form', ['btnText' => 'Guardar'])
            </form>
        </div>
    </div>
@endsection
