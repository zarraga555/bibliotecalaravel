@extends('layaout')
@section('title')
Autores
@endsection
@section('formulario')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 style="align-items: center">Autores</h1>
        @auth
            <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">Crear Nuevo Autor</a></u></h2>
        @endauth
    </div>

    <div id="message-store" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong>Se ha agregado correctamente</strong>
    </div>
    <div id="message-update" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong>Se ha actuzlizado correctamente</strong>
    </div>
    <div id="message-destroy" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong>Se ha borrado el actor</strong>
    </div>

    <div class="panel-body">
        <div id="list-Autor"></div>
        {{-- {{ bibliotecario->links() }} --}}
    </div>
</div>
@include('autor.modalCreate')
@include('autor.modelEdit')
@include('autor.modalDelete')

<script>
    //-----------------------------------------------------
    //-----------------LIMPIADO DE LOS INPUTS--------------
    //-----------------------------------------------------

    function limpiarFormulario() {
        document.getElementById("FormCreate").reset();
    }

    //-----------------------------------------------------
    //-------------MOSTRAR DATOS EN UNA TABLA--------------
    //-----------------------------------------------------

    $(document).ready(function () {
        listAutor();
    });
    var listAutor = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listAutor') }}',
            success: function (data) {
                $('#list-Autor').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (autor) {
        var route = "{{ url('autor') }}/" + autor + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#nombreedit").val(data.nombre);
            $("#nacionalidadedit").val(data.nacionalidad)
        });
    }

    //-----------------------------------------------------
    //----------------------UPDATE-------------------------
    //-----------------------------------------------------
    $("#actualizar").click(function () {
        var id = $("#idedit").val();
        var nombre = $("#nombreedit").val();
        var nacionalidad = $("#nacionalidadedit").val();
        var route = "{{ url('autor') }}/" + id + "";
        var token = $("input[name=_token]").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                nombre: nombre,
                nacionalidad: nacionalidad
            },
            success: function (data) {
                if (data.success == "true") {
                    listAutor();
                    // $('#CreateModal').modal('toggle');
                    $('#EditModal .close').click();
                    // alert("Agregado con exito");
                    $('#message-update').fadeIn();
                    $('#message-update').show().delay(3000).fadeOut(1);
                }
            },
            error: function (data) {
                alert('campos vacios');
            }
        });
    });

    //-----------------------------------------------------
    //-----------------------STORE-------------------------
    //-----------------------------------------------------

    $('#enviar').click(function () {
        var nombre = $("#nombre").val();
        var nacionalidad = $("#nacionalidad").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('autor.store') }}"
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                nombre: nombre,
                nacionalidad: nacionalidad
            },
            success: function (data) {
                if (data.success == "true") {
                    listAutor();
                    limpiarFormulario();
                    $('#CreateModal .close').click();
                    $('#message-store').fadeIn();
                    $('#message-store').show().delay(3000).fadeOut(1);
                }
            }
        });
    });

    //-----------------------------------------------------
    //---------------------ELIMINAR------------------------
    //-----------------------------------------------------
    var Eliminar = function (autor) {
        var route = "{{ url('autor') }}/" + autor + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var autor = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('autor') }}/" + autor;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listAutor();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });
</script>
@endsection
