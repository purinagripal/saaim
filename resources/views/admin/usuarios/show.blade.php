@extends('adminlte::page')

@section('title', 'Mostrar expediente')

@section('content_header')
    <h1>Usuario</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{$usuario->id}}</td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td>{{$usuario->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Anotaciones</th>
                        <td>{{$usuario->anotaciones}}</td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td>{{$usuario->sexo->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Municipio / Isla</th>
                        <td>{{$usuario->municipio->nombre}}</td>
                    </tr>
                    <tr>
                        <th>País de origen</th>
                        <td>{{$usuario->paisorigen->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Nacionalidad</th>
                        <td>{{$usuario->paisnacionalidad->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Beneficiario directo</th>
                        <td>
                            @if ($usuario->beneficiario_directo)
                                {{'Sí'}}
                            @else
                                {{'No'}}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm mr-2" href="{{route('admin.usuarios.edit', $usuario)}}">Editar usuario</a>
            <form action="{{route('admin.usuarios.destroy', $usuario)}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Confirma que deseas eliminar el usuario.\n Se eliminarán también las atenciones del mismo');">Eliminar usuario</button>
            </form>
        </div>
    </div>

    
    <h4>Atenciones del usuario</h4>
    <div class="card">
        <div class="card-header">
            {{-- TO.DO poner para que vuelva aqui despues de crear la atencion --}}
            <a class="btn btn-primary btn-sm" href="{{route('admin.consultas.createexp', $usuario)}}">Generar nueva atención</a>
        </div>
        <div class="card-body">
            @if ($usuario->consultas->count())
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Comentarios</th>
                        <th>Tipo</th>
                        <th colspan="2"></th>
                    </thead>
                    <tbody>
                        @foreach ($usuario->consultas as $consulta)
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
            @else
                <p>No hay atenciones para este usuario.</p> 
            @endif

        </div>
    </div>
    {{-- fin atenciones --}}

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop