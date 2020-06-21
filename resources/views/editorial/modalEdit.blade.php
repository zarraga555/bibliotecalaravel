<!-- MODAL DE EDITADO-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form >
                    {{-- method="POST" action="{{ route('autor.store') }}" --}}
                    @csrf
                    <input type="hidden" id="idedit" name="id" value="{{ old('id') }}">
                    <div class="form-group">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" id="nombreedit" name="nombre" class="form-control @error('nombre') is-invalid @enderror "
                            value="{{ old('nombre') }}">
                        {!! $errors->first('nombre', '<small>:message</small><br>') !!}
                    </div>
                    {{-- <button class="btn btn-primary">Enviar</button> --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="actualizar" class="btn btn-primary" >Save changes</button>
            </div>
        </div>
    </div>
</div>
{{-- FINAL DEL MODAL DE EDITADO --}}
