@extends('layaout')

@section('title')
    Editoriales
@endsection
@section('formulario')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 style="align-items: center">Editoriales</h1>
        @auth
            <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">Crear Nueva Editorial</a></u></h2>
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
        <div id="list-Editorial" class="divTable">

        </div>
    </div>
</div>

@include('editorial.modalCreate')
@include('editorial.modalEdit')
@include('editorial.modalDelete')

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
        listEditorial();
    });
    var listEditorial = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listEditorial') }}',
            success: function (data) {
                $('#list-Editorial').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (editorial) {
        var route = "{{ url('editorial') }}/" + editorial + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#nombreedit").val(data.nombre);
        });
    }

    //-----------------------------------------------------
    //----------------------UPDATE-------------------------
    //-----------------------------------------------------
    $("#actualizar").click(function () {
        var id = $("#idedit").val();
        var nombre = $("#nombreedit").val();
        var route = "{{ url('editorial') }}/" + id + "";
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
            },
            success: function (data) {
                if (data.success == "true") {
                    listEditorial();
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
        var token = $("input[name=_token]").val();
        var route = "{{ route('editorial.store') }}"
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                nombre: nombre,
            },
            success: function (data) {
                if (data.success == "true") {
                    listEditorial();
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
    var Eliminar = function (editorial) {
        var route = "{{ url('editorial') }}/" + editorial + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var editorial = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('editorial') }}/" + editorial;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listEditorial();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });
</script>
@endsection
