<table class="table table-responsive table">
    <thead>
        <tr>
            <th scope="col">CI</th>
            <th scope="col">Compl.</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Direecion</th>
            <th scope="col">Telefono</th>

            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @forelse($persona as $personaitem)
                <td>{{ $personaitem->ci }}</td>
                <td>{{ $personaitem->complemento }}</td>
                <td>{{ $personaitem->nombre }}</td>
                <td>{{ $personaitem->direccion }}</td>
                <td>{{ $personaitem->telefono }}</td>
                <td>
                    <a href="#" onclick="Ver({{$personaitem->id}})" class="btn btnT btn-info"" title="Ver" data-toggle="modal" data-target="#ShowModal"><span class="material-icons">visibility</span></a>
                    <a href="#" onclick='Mostrar({{$personaitem->id}}) ' class="btn btnT btn-success" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                    @if (auth()->check() && auth()->user()->rol == "Administrador")
                        <a href="#" onclick='Eliminar({{$personaitem->id}}) ' class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                    @endif
                </td>
        </tr>
            @empty
                <td colspan="6" class="errortable" align="center">No hay datos disponibles</td>
            @endforelse
    </tbody>
</table>
{{ $persona->links() }}
