@extends('layaout')
@section('title')
    Editar Prestamo |
@endsection
@section('formulario')
<div class="container py-5" style="margin: auto;" >
    <div class="row" style="margin: auto;" >
        <div class="col-md-5" style="margin: auto;">
            <br>
            <h1 style="text-align: center;">Editar Prestamo</h1>
            <br>
            <form method="POST" action="{{ route('prestamos.update', $prestamos) }}">
                @csrf @method('PATCH')
                <div class="form-group mb-3">
                    <label for="codigoLibro">ID</label>
                    <input type="text" class="form-control" id="id" name="id"
                        value="{{ old('id', $prestamos->id) }}" required>
                </div>

                    <div class="form-group mb-3">
                        <label for="tipoPrestamo">Tipo de prestamo</label>
                        <select class="custom-select d-block w-100" id="tipoPrestamo" name="tipoPrestamo" required>
                            <option value="local">local</option>
                            <option value="externo">externo</option>
                        </select>
                    </div>

                        <div class="form-group mb-3">
                            <label for="fecha_prestamo">Fecha Prestamo</label>
                            <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" value="{{ $prestamos->fecha_prestamo }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="fecha_devolucion">Fecha Devolcuion</label>
                            <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion"
                                value="{{ $prestamos->fecha_devolucion }}">
                        </div>

                            <div class="form-group mb-3">
                                <label for="autor_id">Libro</label>
                                <select class="custom-select d-block w-100" id="idLibro" name="idLibro" required>
                                    <div class="invalid-feedback">
                                        Seleccione un libro.
                                    </div>
                                    @foreach($libro as $libroItem)
                                        <option value="{{ $libroItem->id }}"> {{ $libroItem->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group mb-3">
                                <label for="autor_id">persona</label>
                                <select class="custom-select d-block w-100" id="idPersona" name="idPersona" required>
                                    <div class="invalid-feedback">
                                        Seleccione una persona.
                                    </div>
                                    @foreach($persona as $personaItem)
                                        <option value="{{ $personaItem->id }}"> {{ $personaItem->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="autor_id">Usuario</label>
                                <select class="custom-select d-block w-100" id="idUsuario" name="idUsuario" required>
                                    <div class="invalid-feedback">
                                        Seleccione una persona.
                                    </div>
                                    @foreach($usuario as $usuarioItem)
                                        <option value="{{ $usuarioItem->id }}"> {{ $usuarioItem->name }} </option>
                                    @endforeach
                                </select>

                            </div>
                        <hr class="mb-4">
                        <button class="btn btn-success">Guardar cambios</button>
                        <a class="btn btn-block btn-outline-secondary" href="{{ route('prestamos.index') }}">
                            Cancelar
                        </a>
            </form>

        </div>
    </div>
</div>
@endsection
