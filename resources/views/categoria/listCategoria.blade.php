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
            @forelse($categoria as $categoriaitem)
                <td>{{ $categoriaitem->id }}</td>
                <td>{{ $categoriaitem->nombre }}</td>
                <td>
                    <a href="#" onclick="Mostrar({{ $categoriaitem->id  }})" class="btn btnT btn-success" title="Editar" data-toggle="modal" data-target="#EditModal"><span class="material-icons">create</span></a>
                    @if (auth()->check() && auth()->user()->rol == "Administrador")
                        <a href="#" onclick="Eliminar({{ $categoriaitem->id }})" class="btn btnT btn-danger" data-toggle="modal" data-target="#exampleModalCenter" title="Borrar"><span class="material-icons">delete</span></a>
                    @endif
                </td>
        </tr>
            @empty
        <tr>
            <td colspan="3" class="errortable" align="center">No hay datos disponibles</td>
        </tr>
            @endforelse
    </tbody>
</table>

{{ $categoria->links() }}
