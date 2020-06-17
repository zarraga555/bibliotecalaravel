@extends('layaout')

@section('title')
    Editar Clientes
@endsection
@section('formulario')
    <div class="col">
        <h1>@lang('Editar Persona')</h1><br>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('persona.update', $personaitem) }}">
                @method('PATCH')
                @include('persona._form', ['btnText' => 'Guardar Cambios'])
            </form>
        </div>
    </div>
@endsection
