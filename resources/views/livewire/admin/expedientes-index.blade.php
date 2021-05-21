<div class="card">
    <div class="card-header">
        <a class="btn btn-primary mb-4 mr-3" href="{{route('admin.expedientes.create')}}">Crear expediente de nuevo usuario</a>
        <a class="btn btn-primary mb-4" href="{{route('admin.usuarios.index')}}">Crear expediente de usuario registrado</a>

        <input wire:model="search" type="search" class="form-control" placeholder="Introduzca nombre o apellidos para filtrar resultados">
    </div>

    @if ($expedientes->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th colspan="3"></th>
                </thead>
                <tbody>
                    @foreach ($expedientes as $expediente)
                        <tr>
                            <td><a href="{{route('admin.expedientes.show', $expediente)}}">{{$expediente->id}}</a></td>
                            <td><a href="{{route('admin.expedientes.show', $expediente)}}">{{$expediente->nombre}}</a></td>
                            <td><a href="{{route('admin.expedientes.show', $expediente)}}">{{$expediente->apellidos}}</a></td>
                            <td width="130px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.consultas.createexp', $expediente->usuario)}}">Crear atención</a>
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.expedientes.edit', $expediente)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.expedientes.destroy', $expediente)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¡Atención!\n Se eliminarán también las atenciones del expediente\n Confirma que deseas eliminar el expediente');">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$expedientes->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay expedientes que coincidan con el filtro de búsqueda.</strong>
        </div>
    @endif
    
</div>