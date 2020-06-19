<div class="row justify-content-md-center">
    <div class="col-md-6">
        <form method="POST" action="{{ route('prestamo.store') }}">
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
