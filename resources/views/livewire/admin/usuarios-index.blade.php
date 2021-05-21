<div class="card">
    <div class="card-header">
        <input wire:model="search" type="search" class="form-control" placeholder="Introduzca nombre para filtrar resultados">
    </div>

    @if ($usuarios->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nacionalidad</th>
                    <th>Expediente</th>
                    <th colspan="3"></th>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            @if ($usuario->expediente)
                                {{-- el usuario tiene expediente, se trata como expediente --}}
                                <td><a href="{{route('admin.expedientes.show', $usuario->expediente)}}">{{$usuario->id}}</a></td>
                                <td><a href="{{route('admin.expedientes.show', $usuario->expediente)}}">{{$usuario->nombre}}</a></td>
                                <td><a href="{{route('admin.expedientes.show', $usuario->expediente)}}">{{$usuario->paisnacionalidad->nombre}}</a></td>
                                <td><a href="{{route('admin.expedientes.show', $usuario->expediente)}}">{{$usuario->expediente->nombre.' '.$usuario->expediente->apellidos.' '.$usuario->expediente->doc_identif}}</a></td>
                                <td width="130px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.consultas.createexp', $usuario)}}">Crear atención</a>
                                </td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.expedientes.edit', $usuario->expediente)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('admin.expedientes.destroy', $usuario->expediente)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¡Atención!\n Se eliminará el EXPEDIENTE y las ATENCIONES del usuario.\n Confirma que deseas eliminar el usuario');">Eliminar</button>
                                    </form>
                                </td>
                            @else
                                {{-- el usuario no tiene expediente --}}
                                <td><a href="{{route('admin.usuarios.show', $usuario)}}">{{$usuario->id}}</a></td>
                                <td><a href="{{route('admin.usuarios.show', $usuario)}}">{{$usuario->nombre}}</a></td>
                                <td><a href="{{route('admin.usuarios.show', $usuario)}}">{{$usuario->paisnacionalidad->nombre}}</a></td>
                                <td><a class="btn btn-primary btn-sm" href="{{route('admin.expedientes.create', $usuario)}}">Crear expediente</a></td>
                                <td width="130px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.consultas.createexp', $usuario)}}">Crear atención</a>
                                </td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.usuarios.edit', $usuario)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('admin.usuarios.destroy', $usuario)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¡Atención!\n Se eliminarán también las atenciones del usuario.\n Confirma que deseas eliminar el usuario');">Eliminar</button>
                                    </form>
                                </td>
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$usuarios->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay usuarios que coincidan con el filtro de búsqueda.</strong>
        </div>
    @endif
    
</div>