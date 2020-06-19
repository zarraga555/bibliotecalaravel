@extends('layaout')

@section('title')
    Autores

@endsection
@section('formulario')
<div class="col">
    {{-- <h1>{{__('Send Message') }}</h1> --}}
    <h1>@lang('Autores')</h1><br>
    <a href="#"class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">Nuevo Autor</a><br><br>
    {{-- <a href=" {{ route('autor.create') }} " class="btn btn-primary">Nuevo Autor</a> --}}
    {{-- @if ($errors->any())
@foreach($errors->all() as $error)
            {{ $error }}<br>
    @endforeach
    @endif--}}
</div>

<div id="message-update" class="alert alert-success alert-dismissible" role="alert" style="display:none">
    <strong>Se ha actuzlizado correctamente</strong>
</div>

<div class="panel-body">
    <div id="list-Autor"></div>
    {{-- {{ bibliotecario->links() }} --}}
</div>
@include('autor.modelEdit')
@include('autor.modalCreate')




<script>

//-----------------------------------------------------
//-------------MOSTRAR DATOS EN UNA TABLA--------------
//-----------------------------------------------------

    $(document).ready(function(){
        listAutor();
    });
    var listAutor = function(){
        $.ajax({
            type:'get',
            url:'{{ url('listAutor') }}',
            success: function(data){
                $('#list-Autor').empty().html(data);
            }
        });
    }

//-----------------------------------------------------
//---------------------EDIT----------------------------
//-----------------------------------------------------
var Mostrar = function(autor){
        var route = "{{ url('autor') }}/"+autor+"/edit";
        $.get(route, function(data){
            $("#idedit").val(data.id);
            $("#nombreedit").val(data.nombre);
            $("#nacionalidadedit").val(data.nacionalidad)
        });
    }

//-----------------------------------------------------
//----------------------UPDATE-------------------------
//-----------------------------------------------------
$("#actualizar").click(function(){
    var id = $("#idedit").val();
    var nombre = $("#nombreedit").val();
    var nacionalidad = $("#nacionalidadedit").val();
    var route = "{{ url('autor')}}/"+id+"";
    var token = $("input[name=_token]").val();
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'json',
        data: {
            nombre: nombre,
            nacionalidad: nacionalidad
        },
        success: function(data){
            if(data.success == "true"){
                listAutor();
                // $('#CreateModal').modal('toggle');
                $('#EditModal .close').click();
                // alert("Agregado con exito");
                $('#message-update').fadeIn();
            }
        },
        error:function(data){
            alert('campos vacios');
        }
    });
});

//-----------------------------------------------------
//-----------------------STORE-------------------------
//-----------------------------------------------------

$('#enviar').click(function(){
    var nombre = $("#nombre").val();
    var nacionalidad = $("#nacionalidad").val();
    var token = $("input[name=_token]").val();
    var route = "{{ route('autor.store') }}"
    $.ajax({
        url: route,
        headers:{'X-CSRF-TOKEN':token},
        type: 'POST',
        dataType: 'json',
        data: {
            nombre:nombre,
            nacionalidad:nacionalidad
        },
        success:function(data){
            if(data.success == "true"){
                listAutor();
                $('#CreateModal .close').click();
                $('#message-update').fadeIn();
            }
        }
    });
});

//-----------------------------------------------------
//---------------------ELIMINAR-------------------------
//-----------------------------------------------------
var Eliminar = function(autor){
alert(autor);
}
</script>
@endsection
