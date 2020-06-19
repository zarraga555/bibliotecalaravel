@extends('layaout')
<form method="POST" action="{{ route('libros.store') }}">
    @csrf
    <div class="mb-3">
        <label for="codigoLibro">Codigo libro</label>
        <input type="text" class="form-control" id="codigoLibro" name="codigoLibro"
            value="{{old('codigolibro')}}" required>
    </div>



    <div class="mb-3">
        <label for="nombre">Nombre libro</label>
        <input type="text" class="form-control" id="nombres" name="nombres"
            value="{{old('nombre')}}" required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="paginas">Num. paginas</label>
            <input type="text" class="form-control" id="paginas" name="paginas"
                value="{{$libro ->paginas}}" required>
             <div>
              <input type="date" id="fecha" name="fecha">
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="autor_id">Autor</label>
                    <select class="custom-select d-block w-100" id="autor" name="autor"
                     required>
                     <div class="invalid-feedback">
                        Seleccione un autor.
                    </div>
                     @foreach ($autor as $autorItem)
                        <option value="{{$autorItem->id}}"> {{$autorItem->nombre}} </option>
                     @endforeach
                    </select>
                   
                </div>
            </div>

    <div class="row">
        <div class="col-md-5 mb-3">
            <label for="editorial_id">Editorial</label>
            <select class="custom-select d-block w-100" id="editorial" name="editorial"
             required>
             @foreach ($editorial as $editorialItem)
                <option value="{{$editorialItem->id}}"> {{$editorialItem->nombre}} </option>
             @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 mb-3">
            <label for="categoria_libro_id">Categoria</label>
            <select class="custom-select d-block w-100" id="categoria_libro_id" name="categoria_libro_id"
             required>
             <div class="invalid-feedback">
                Seleccione una categoria.
            </div>
             @foreach ($categoria as $categoriaItem)
                <option value="{{$categoriaItem->id}}"> {{$categoriaItem->nombre}} </option>
             @endforeach
            </select>
        </div>
    </div>
    <hr class="mb-4">
    <button class="btn btn-primary">Enviar</button>     
    <a class="btn btn-link btn-block" href="{{route('libros.index')}}">
        Cancelar
    </a>
</form>