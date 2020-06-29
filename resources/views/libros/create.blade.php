@extends('layaout')
@section('title')
Crear Libros
@endsection
@section('formulario')
<div class="container py-5" style="margin: auto;">
    <div class="row" style="margin: auto;">
        <div class="col-md-5" style="margin: auto;">
            <br>
            <h1 style="text-align: center;">Crear Libro</h1>
            <br>
            <form method="POST" action="{{ route('libros.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="codigoLibro">Codigo libro</label>
                    <input type="text" class="form-control" id="codigoLibro" name="codigoLibro"
                        value="{{ old('codigolibro') }}" required>
                </div>

                <div class=" form-group mb-3">
                    <label for="nombre">Nombre libro</label>
                    <input type="text" class="form-control" id="nombres" name="nombres"
                        value="{{ old('nombre') }}" required>
                </div>

                    <div class="form-group  mb-3">
                        <label for="paginas">Num. paginas</label>
                        <input type="text" class="form-control" id="paginas" name="paginas"
                            value="{{ $libro ->paginas }}" required>
                    </div>
                        <div class="form-group mb-3">
                            <label for="paginas">Fecha de Lanzamiento</label>
                            <input type="date" class="form-control" id="fecha" name="fecha">
                        </div>
                            <div class="form-group mb-3">
                                <label for="autor_id">Autor</label>
                                <select class="custom-select d-block w-100" id="autor" name="autor" required>
                                    <div class="invalid-feedback">
                                        Seleccione un autor.
                                    </div>
                                    <option value="">Seleeciona una Opcion</option>
                                    @foreach($autor as $autorItem)
                                        <option value="{{ $autorItem->id }}"> {{ $autorItem->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group mb-3">
                                <label for="editorial_id">Editorial</label>
                                <select class="custom-select d-block w-100" id="editorial" name="editorial" required>
                                    <option value="">Seleeciona una Opcion</option>
                                    @foreach($editorial as $editorialItem)
                                        <option value="{{ $editorialItem->id }}"> {{ $editorialItem->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="categoria_libro_id">Categoria</label>
                                <select class="custom-select d-block w-100" id="categoria_libro_id"
                                    name="categoria_libro_id" required>
                                    <div class="invalid-feedback">
                                        Seleccione una categoria.
                                    </div>
                                    <option value="">Seleeciona una Opcion</option>
                                    @foreach($categoria as $categoriaItem)
                                        <option value="{{ $categoriaItem->id }}"> {{ $categoriaItem->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        <hr class="mb">
                        <button class="btn btn-primary">Guardar</button>
                        <a class="btn btn-link btn-block" href="{{ route('libros.index') }}">
                            Cancelar
                        </a>
            </form>
        </div>
    </div>
</div>
@endsection
