<table class="table table-responsive table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Nacionalidad</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @forelse($autor as $autoritem)
                <td>{{ $autoritem->nombre }}</td>
                <td>{{ $autoritem->nacionalidad }}</td>
                <td>
                    <a href="#" onclick='Mostrar({{$autoritem->id}}) ' class="btn btnT btn-success" title="Editar" class="btn btn-primary" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                    <a href="#" onclick='Eliminar({{$autoritem->id}}) ' class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                </td>
        </tr>
            @empty
        <tr>
            <td colspan="3" class="errortable" align="center">No hay datos disponibles</td>
        </tr>
            @endforelse
    </tbody>
</table>
