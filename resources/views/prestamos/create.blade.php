@extends('layaout')
@section('title')
Crear Prestamo
@endsection
@section('formulario')
    <div class="container">
        <form method="POST" action="{{ route('prestamos.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id">Id del prestamo</label>
                <input type="text" class="form-control" id="id" name="id"
                    value="{{ old('id') }}" required>
            </div>



            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="tipoPrestamo">Tipo de prestamo</label>
                    <select class="custom-select d-block w-100" id="tipoPrestamo" name="tipoPrestamo" required>
                        <option value="local">local</option>
                        <option value="externo">externo</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <input type="date" id="fecha_prestamo" name="fecha_prestamo">
                    </div>
                    <div>
                        <input type="date" id="fecha_devolucion" name="fecha_devolucion">
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="idLibro">Libro</label>
                            <select class="custom-select d-block w-100" id="libro" name="libro" required>
                                @foreach($libro as $librolItem)
                                    <option value="{{ $librolItem->id }}"> {{ $librolItem->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="idPersona">Persona</label>
                            <select class="custom-select d-block w-100" id="persona" name="persona"
                                required>
                                <div class="invalid-feedback">
                                    Seleccione a la persona.
                                </div>
                                @foreach($persona as $personaItem)
                                    <option value="{{ $personaItem->id }}"> {{ $personaItem->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="idUsuario">Usuario</label>
                            <select class="custom-select d-block w-100" id="usuario" name="usuario"
                                required>
                                <div class="invalid-feedback">
                                    Seleccione el usuario.
                                </div>
                                @foreach($usuario as $usuarioItem)
                                    <option value="{{ $usuarioItem->id }}"> {{ $usuarioItem->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary">Enviar</button>
                    <a class="btn btn-link btn-block" href="{{ route('prestamos.index') }}">
                        Cancelar
                    </a>
        </form>
    </div>
@endsection