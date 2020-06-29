<table class="table table-responsive table">
    <thead>
        <tr>
            <th scope="col">CI</th>
            <th scope="col">Compl.</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Correo</th>
            <th scope="col">Turno</th>
            <th scope="col">Salario Bs</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody id="tbody">
        <tr>
            @forelse($bibliotecario as $bibliotecarioitem)
                <td>{{ $bibliotecarioitem->ci }}</td>
                <td>{{ $bibliotecarioitem->complemento }}</td>
                <td>{{ $bibliotecarioitem->nombre }}</td>
                <td>{{ $bibliotecarioitem->correo }}</td>
                <td>{{ $bibliotecarioitem->turno }}</td>
                <td>{{ $bibliotecarioitem->salario }}</td>
                <td>
                    <a href="#" onclick="Ver({{$bibliotecarioitem->id}})" class="btn btnT btn-info"" title="Ver" data-toggle="modal" data-target="#ShowModal"><span class="material-icons">visibility</span></a>
                    @if (auth()->check() && auth()->user()->rol == "Administrador")
                        <a href="#" onclick='Mostrar({{$bibliotecarioitem->id}}) ' class="btn btnT btn-success" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                        <a href="#" onclick='Eliminar({{$bibliotecarioitem->id}}) ' class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                    @endif
                </td>
        </tr>
    @empty
        <tr>
            <td colspan="9" class="errortable" align="center">No hay datos disponibles</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $bibliotecario->links() }}
