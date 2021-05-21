<div class="card">
    <div class="card-header">
        <a class="btn btn-primary mb-4 mr-3" href="{{route('admin.consultas.create')}}">Crear atención de nuevo usuario</a>
        <a class="btn btn-primary mb-4 mr-3" href="{{route('admin.usuarios.index')}}">Crear atención de usuario registrado</a>
        <a class="btn btn-primary mb-4" href="{{route('admin.expedientes.index')}}">Crear atención de expediente</a>
        
        <input wire:model="search" class="form-control" placeholder="Introduzca fecha de atención o comentarios para filtrar resultados">
    </div>
    @if ($consultas->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Comentarios</th>
                    <th>Tipo</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach ($consultas as $consulta)
                        <tr>
                            <td><a href="{{route('admin.consultas.show', $consulta)}}">{{$consulta->id}}</a></td>
                            <td><a href="{{route('admin.consultas.show', $consulta)}}">{{$consulta->fecha}}</a></td>
                            <td><a href="{{route('admin.consultas.show', $consulta)}}">{{$consulta->comentarios}}</a></td>
                            <td><a href="{{route('admin.consultas.show', $consulta)}}">{{$consulta->tipo->nombre}}</a></td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.consultas.edit', $consulta)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.consultas.destroy', $consulta)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Confirma que deseas eliminar la atención');">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$consultas->links()}}
        </div>
        
    @else
        <div class="card-body">
            <strong>No hay atenciones que coincidan con el filtro de búsqueda.</strong>
        </div>
    @endif
    
</div>