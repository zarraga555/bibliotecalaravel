@csrf
<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
        </div>
        <div class="col-md-8 order-md-1">
            <form class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="codigoLibro">Codigo libro</label>
                    <input type="text" class="form-control" id="codigoLibro" name="codigoLibro"
                        value="{{old('codigolibro', $libro ->codigoLibro)}}" required>
                </div>



                <div class="mb-3">
                    <label for="nombres">Nombre</label>
                    <input type="text" class="form-control" id="nombres" name="nombres"
                        value="{{old('nombres', $libro ->nombres)}}" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="paginas">Num. paginas</label>
                        <input type="text" class="form-control" id="paginas" name="paginas"
                            value="{{$libro ->paginas}}" required>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="autor_id">Autor</label>
                                <select class="custom-select d-block w-100" id="autor_id" name="autor_id"
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
                        <select class="custom-select d-block w-100" id="editorial_id" name="editorial_id"
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
        </div>
    </div>
</div>