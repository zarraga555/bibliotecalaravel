@extends('layaout')

@section('title')
Clientes
@endsection
@section('formulario')

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 style="align-items: center">Personas Registradas</h1>
        @auth
            <h2><u><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">Crear Nueva Persona</a></u></h2>
        @endauth
    </div>

    <div id="message-store" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong>Se ha agregado correctamente</strong>
    </div>
    <div id="message-update" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong>Se ha actuzlizado correctamente</strong>
    </div>
    <div id="message-destroy" class="alert alert-danger alert-dismissible" role="alert" style="display:none">
        <strong>Se ha borrado el correctamente</strong>
    </div>

    <div class="panel-body my-5">
        <div id="list-Persona" class="divTable"></div>
    </div>

</div>

@include('persona.modalCreate')
@include('persona.modalEdit')
@include('persona.modalDelete')
@include('persona.modalShow')

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
        listPersona();
    });
    var listPersona = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listPersona') }}',
            success: function (data) {
                $('#list-Persona').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------SHOW----------------------------
    //-----------------------------------------------------
    var Ver = function (persona) {
        var route = "{{ url('persona') }}/" + persona + "/edit";
        $.get(route, function (data) {
            $("#idShow").val(data.id);
            $("#ciShow").val(data.ci);
            $("#complementoShow").val(data.complemento);
            $("#nombreShow").val(data.nombre);
            document.getElementById("nombreTShow").innerHTML = "Datos de: "+data.nombre;
            $("#direccionShow").val(data.direccion);
            $("#telefonoShow").val(data.telefono);
            $("#correoShow").val(data.correo);
            $("#fechaNacimientoShow").val(data.fechaNacimiento);
            $("#paisNacimientoShow").val(data.paisNacimiento);
            // $("#sexoShow").val(data.sexo);
        });
    }
    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (persona) {
        var route = "{{ url('persona') }}/" + persona + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#ciedit").val(data.ci);
            $("#complementoedit").val(data.complemento);
            $("#nombreedit").val(data.nombre);
            $("#direccionedit").val(data.direccion);
            $("#telefonoedit").val(data.telefono);
            $("#correoedit").val(data.correo);
            $("#fechaNacimientoedit").val(data.fechaNacimiento);
            $("#paisNacimientoedit").val(data.paisNacimiento);
            // $("#sexoedit").val(data.sexo);
        });
    }

    //-----------------------------------------------------
    //----------------------UPDATE-------------------------
    //-----------------------------------------------------
    $("#actualizar").click(function () {
        var id = $("#idedit").val();
        var ci = $("#ciedit").val();
        var complemento = $("#complementoedit").val();
        var nombre = $("#nombreedit").val();
        var direccion = $("#direccionedit").val();
        var telefono = $("#telefonoedit").val();
        var correo = $("#correoedit").val();
        var fechaNacimiento = $("#fechaNacimientoedit").val();
        var paisNacimiento = $("#paisNacimientoedit").val();
        // var sexo = $("#sexoedit").val();
        var route = "{{ url('persona') }}/" + id + "";
        var token = $("input[name=_token]").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'PUT',
            dataType: 'json',
            data: {
                ci: ci,
                complemento: complemento,
                nombre: nombre,
                direccion: direccion,
                telefono: telefono,
                correo: correo,
                fechaNacimiento: fechaNacimiento,
                paisNacimiento: paisNacimiento,
            },
            success: function (data) {
                if (data.success == "true") {
                    listPersona();
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
        var ci = $("#ci").val();
        var complemento = $("#complemento").val();
        var nombre = $("#nombre").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();
        var correo = $("#correo").val();
        var fechaNacimiento = $("#fechaNacimiento").val();
        var paisNacimiento = $("#paisNacimiento").val();
        // var sexo = $("#sexo").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('persona.store') }}"
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                ci: ci,
                complemento: complemento,
                nombre: nombre,
                direccion: direccion,
                telefono: telefono,
                correo: correo,
                fechaNacimiento: fechaNacimiento,
                paisNacimiento: paisNacimiento,
            },
            success: function (data) {
                if (data.success == "true") {
                    listPersona();
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
    var Eliminar = function (persona) {
        var route = "{{ url('persona') }}/" + persona + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var persona = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('persona') }}/" + persona;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listPersona();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });
</script>
@endsection
