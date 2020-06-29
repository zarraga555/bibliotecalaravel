@extends('layaout')
@section('title')
Crear Prestamo
@endsection
@section('formulario')
    <div class="container py-5" style="margin: auto;">
        <div class="row" style="margin: auto;">
            <div class="col-md-5" style="margin: auto;">
                <br>
                <h1 style="text-align: center;">Reservar</h1>
                <br>
                <form method="POST" action="{{ route('prestamos.store') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id">Id del prestamo</label>
                        <input type="text" class="form-control" id="id" name="id"
                            value="{{ old('id') }}" required>
                    </div>

                        <div class="form-group mb-3">
                            <label for="tipoPrestamo">Tipo de prestamo</label>
                            <select class="custom-select d-block w-100" id="tipoPrestamo" name="tipoPrestamo" required>
                                <option value="">Selecciona una Opcion</option>
                                <option value="Local">Local</option>
                                <option value="Externo">Externo</option>
                            </select>
                        </div>

                            <div class="fomr-group mb-3">
                                <label for="fecha_prestamo">Fecha de Prestamo</label>
                                <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo">
                            </div>

                            <div class="form-group mb-3">
                                <label for="fecha_devolucion">Fecha de Devolcion</label>
                                <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion">
                            </div>

                                <div class="form-group mb-3">
                                    <label for="libro_id">Libro</label>
                                    <select class="custom-select d-block w-100" id="idLibro" name="idLibro" required>
                                        <div class="invalid-feedback">
                                            Seleccione un Libro.
                                        </div>
                                        <option value="">Selecciona una Opcion</option>
                                        @foreach($libro as $libroItem)
                                            <option value="{{ $libroItem->id }}"> {{ $libroItem->nombre }} </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="persona_id">Persona</label>
                                    <select class="custom-select d-block w-100" id="idPersona" name="idPersona" required>
                                        <div class="invalid-feedback">
                                            Seleccione un Libro.
                                        </div>
                                        <option value="">Selecciona una Opcion</option>
                                        @foreach($persona as $personaItem)
                                            <option value="{{ $personaItem->id }}"> {{ $personaItem->nombre }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="idUsuario">Usuario</label>
                                    <select class="custom-select d-block w-100" id="idUsuario" name="idUsuario"
                                        required>
                                        <div class="invalid-feedback">
                                            Seleccione el usuario.
                                        </div>
                                        <option value="">Selecciona una Opcion</option>
                                        @foreach($usuario as $usuarioItem)
                                            <option value="{{ $usuarioItem->id }}"> {{ $usuarioItem->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary">Guardar</button>
                            <a class="btn btn-block btn-outline-secondary" href="{{ route('prestamos.index') }}">
                                Cancelar
                            </a>
                </form>
            </div>
        </div>
    </div>
@endsection
