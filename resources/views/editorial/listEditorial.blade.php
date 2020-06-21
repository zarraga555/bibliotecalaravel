<table class="table table-responsive table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @forelse($editorial as $editorialitem)
                <td>{{ $editorialitem->id }}</td>
                <td>{{ $editorialitem->nombre }}</td>
                <td>
                    <a href="#" onclick="Mostrar({{ $editorialitem->id  }})" class="btn btn-success" title="Editar" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                    <a href="#" onclick="Eliminar({{ $editorialitem->id  }})" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                </td>
        </tr>
            @empty
        <tr>
            <td colspan="3" class="errortable" align="center">No hay datos disponibles</td>
        </tr>
            @endforelse
    </tbody>
</table>

{{-- {{ $editorial->links() }} --}}
