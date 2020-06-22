<!-- MODAL DE ELIMINADO LOGICO-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Eliminar Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                @csrf
                <input type="hidden" id="idDelete" name="idDelete" value="">
                <div class="modal-body">
                    ¿Estas seguro que deseas eliminar a la Persona?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="delete" class="btn btn-danger btn-danger">Eliminar</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- FINAL DEL MODAL DE ELIMINADO LOGICO-->
