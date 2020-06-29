@extends('layaout')

@section('title')
Bibliotecarios
@endsection
@section('formulario')

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 style="align-items: center">Bibliotecarios</h1>
        @if(auth()->check() && auth()->user()->rol == "Administrador")
            <h2><a href="#" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">Crear Nuevo Bibliotecario</a></h2>
        @endif
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
        <div class="row col-lg-6">
            <div class="col-sm">
                <input type="text" class="form-control col-sm" name="search" id="search" placeholder="Buscar por Nombre">
            </div><br><br>
            <div class="col-sm">
                <input type="text" class="form-control col-sm" name="ciSearch" id="ciSearch" placeholder="Buscar por CI">
            </div>
            <br>
        </div>
        <br>
        <div id="list-Bibliotecario" class="divTable"></div>
    </div>

</div>
@include('bibliotecario.modalCreate')
@include('bibliotecario.modalEdit')
@include('bibliotecario.modalDelete')
@include('bibliotecario.modalShow')

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
        listBibliotecario();
    });
    var listBibliotecario = function () {
        $.ajax({
            type: 'get',
            url: '{{ url('listBibliotecario') }}',
            success: function (data) {
                $('#list-Bibliotecario').empty().html(data);
            }
        });
    }

    //-----------------------------------------------------
    //---------------------SHOW----------------------------
    //-----------------------------------------------------
    var Ver = function (bibliotecario) {
        var route = "{{ url('bibliotecario') }}/" + bibliotecario + "/edit";
        $.get(route, function (data) {
            $("#idShow").val(data.id);
            $("#ciShow").val(data.ci);
            $("#complementoShow").val(data.complemento);
            $("#nombreShow").val(data.nombre);
            document.getElementById("nombreTShow").innerHTML = "Datos de: "+data.nombre;
            $("#direccionShow").val(data.direccion);
            $("#telefonoShow").val(data.telefono);
            $("#correoShow").val(data.correo);
            $("#turnoShow").val(data.turno);
            $("#salarioShow").val(data.salario);
            $("#fechaNacimientoShow").val(data.fechaNacimiento);
            $("#paisNacimientoShow").val(data.paisNacimiento);
            $("#sexoShow").val(data.sexo);
        });
    }
    //-----------------------------------------------------
    //---------------------EDIT----------------------------
    //-----------------------------------------------------
    var Mostrar = function (bibliotecario) {
        var route = "{{ url('bibliotecario') }}/" + bibliotecario + "/edit";
        $.get(route, function (data) {
            $("#idedit").val(data.id);
            $("#ciedit").val(data.ci);
            $("#complementoedit").val(data.complemento);
            $("#nombreedit").val(data.nombre);
            $("#direccionedit").val(data.direccion);
            $("#telefonoedit").val(data.telefono);
            $("#correoedit").val(data.correo);
            $("#turnoedit").val(data.turno);
            $("#salarioedit").val(data.salario);
            $("#fechaNacimientoedit").val(data.fechaNacimiento);
            $("#paisNacimientoedit").val(data.paisNacimiento);
            $("#sexoedit").val(data.sexo);
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
        var turno = $("#turnoedit").val();
        var salario = $("#salarioedit").val();
        var fechaNacimiento = $("#fechaNacimientoedit").val();
        var paisNacimiento = $("#paisNacimientoedit").val();
        var sexo = $("#sexoedit").val();
        var route = "{{ url('bibliotecario') }}/" + id + "";
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
                turno: turno,
                salario: salario,
                fechaNacimiento: fechaNacimiento,
                paisNacimiento: paisNacimiento,
                sexo: sexo,
            },
            success: function (data) {
                if (data.success == "true") {
                    listBibliotecario();
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
        var turno = $("#turno").val();
        var salario = $("#salario").val();
        var fechaNacimiento = $("#fechaNacimiento").val();
        var paisNacimiento = $("#paisNacimiento").val();
        var sexo = $("#sexo").val();
        var token = $("input[name=_token]").val();
        var route = "{{ route('bibliotecario.store') }}"
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
                turno: turno,
                salario:salario,
                fechaNacimiento: fechaNacimiento,
                paisNacimiento: paisNacimiento,
                sexo: sexo,
            },
            success: function (data) {
                if (data.success == "true") {
                    listBibliotecario();
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
    var Eliminar = function (bibliotecario) {
        var route = "{{ url('bibliotecario') }}/" + bibliotecario + "/edit";
        $.get(route, function (data) {
            $("#idDelete").val(data.id);
        });
    }

    //-----------------------------------------------------
    //---------------------DESTROY-------------------------
    //-----------------------------------------------------
    $('#delete').click(function () {
        var bibliotecario = $("#idDelete").val();
        var token = $("input[name=_token]").val();
        var route = "{{ URL('bibliotecario') }}/" + bibliotecario;
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'DELETE',
            success: function (data) {
                if (data.success == "true") {
                    listBibliotecario();
                    $('#exampleModalCenter .close').click();
                    $('#message-destroy').fadeIn();
                    $('#message-destroy').show().delay(3000).fadeOut(1);
                }
            }
        });
    });

    //-----------------------------------------------------
    //----------------------SEARCH-------------------------
    //-----------------------------------------------------

    $(document).on('keyup', '#search, #ciSearch', function(){
        var search = $('#search').val();
        var ci = $('#ciSearch').val();
        var route = "{{ route('bibliotecario.search') }}"
        $.ajax({
            type: 'GET',
            url: route,
            data: {
                search: search,
                ci: ci,
            },
            success: function(data){
                console.log(data);
                    $('tbody').empty().html(data);


            }

        });
    });

</script>
@endsection

