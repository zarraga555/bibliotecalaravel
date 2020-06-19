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
                        value="{{old('nroDocumento', $listaEmpleados ->nroDocumento)}}" required>
                    <div class="invalid-feedback">
                        Por favor introduzca el codigo del libro.
                    </div>
                </div>



                <div class="mb-3">
                    <label for="nombres">Nombre</label>
                    <input type="text" class="form-control" id="nombres" name="nombres"
                        value="{{old('nombres', $listaEmpleados ->nombres)}}" required>
                    <div class="invalid-feedback">
                        Por favor introduzca su nombre.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="paginas">Num. paginas</label>
                        <input type="text" class="form-control" id="paginas" name="paginas"
                            value="{{$listaEmpleados ->apPaterno}}" required>
                        <div class="invalid-feedback">
                            Por favor introduzca la cantidad de paginas.
                        </div>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="autor_id">Autor</label>
                                <select class="custom-select d-block w-100" id="autor_id" name="autor_id"
                                 required>
                                 @foreach ($listaEmpleado as $portItem)
                                    <option value="{{$portItem->id}}"> {{$portItem->descripcion}} </option>
                                 @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Seleccione un autor.
                                </div>
                            </div>
                        </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="editorial_id">Editorial</label>
                        <select class="custom-select d-block w-100" id="editorial_id" name="editorial_id"
                         required>
                         @foreach ($listaEmpleado as $portItem)
                            <option value="{{$portItem->id}}"> {{$portItem->descripcion}} </option>
                         @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Seleccione tipo de Empleado.
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="categoria_libro_id">Categoria</label>
                        <select class="custom-select d-block w-100" id="categoria_libro_id" name="categoria_libro_id"
                         required>
                         @foreach ($listaEmpleado as $portItem)
                            <option value="{{$portItem->id}}"> {{$portItem->descripcion}} </option>
                         @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Seleccione una categoria.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block">
                    {{ $btnText }}
                </button>
                <a class="btn btn-link btn-block" href="{{route('listaEmpleados.index')}}">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>