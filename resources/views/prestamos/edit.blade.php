<form method="POST" action="{{ route('prestamos.update', $prestamos) }}">
    @csrf @method('PATCH')
    <div class="mb-3">
        <label for="codigoLibro">ID</label>
        <input type="text" class="form-control" id="id" name="id"
            value="{{old('id', $prestamos->id)}}" required>
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
             <input type="date" id="fecha_prestamo" name="fecha_prestamo" value="{{$prestamos->fecha_prestamo}}">
            </div>
            <div>
                <input type="date" id="fecha_devolucion" name="fecha_devolucion" value="{{$prestamos->fecha_devolucion}}">
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="autor_id">Libro</label>
                    <select class="custom-select d-block w-100" id="idLibro" name="idLibro"
                     required>
                     <div class="invalid-feedback">
                        Seleccione un libro.
                    </div>
                     @foreach ($libro as $libroItem)
                        <option value="{{$libroItem->id}}"> {{$libroItem->nombre}} </option>
                     @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="autor_id">persona</label>
                    <select class="custom-select d-block w-100" id="idPersona" name="idPersona"
                     required>
                     <div class="invalid-feedback">
                        Seleccione una persona.
                    </div>
                     @foreach ($persona as $personaItem)
                        <option value="{{$personaItem->id}}"> {{$personaItem->nombre}} </option>
                     @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="autor_id">Usuario</label>
                    <select class="custom-select d-block w-100" id="idUsuario" name="idUsuario"
                     required>
                     <div class="invalid-feedback">
                        Seleccione una persona.
                    </div>
                     @foreach ($usuario as $usuarioItem)
                        <option value="{{$usuarioItem->id}}"> {{$usuarioItem->name}} </option>
                     @endforeach
                    </select>
                   
                </div>
            </div>
    <hr class="mb-4">
    <button class="btn btn-primary">Enviar</button>     
    <a class="btn btn-link btn-block" href="{{route('prestamos.index')}}">
        Cancelar
    </a>
</form>