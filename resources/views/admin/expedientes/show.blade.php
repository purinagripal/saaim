@extends('adminlte::page')

@section('title', 'Mostrar expediente')

@section('content_header')
    <h1>Expediente</h1>
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
                        <th>Número de expediente</th>
                        <td>{{$expediente->num_expediente}}</td>
                    </tr>
                    <tr>
                        <th>Fecha de registro (AAAA-mm-dd)</th>
                        <td>{{$expediente->fecha_registro}}</td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td>{{$expediente->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Apellidos</th>
                        <td>{{$expediente->apellidos}}</td>
                    </tr>
                    <tr>
                        <th>Fecha de nacimiento (AAAA-mm-dd)</th>
                        <td>{{$expediente->fecha_nacimiento}}</td>
                    </tr>
                    <tr>
                        <th>Documento de identidad</th>
                        <td>{{$expediente->doc_identif}}</td>
                    </tr>
                    <tr>
                        <th>Domicilio</th>
                        <td>{{$expediente->domicilio}}</td>
                    </tr>
                    <tr>
                        <th>Código Postal</th>
                        <td>{{$expediente->codigo_postal}}</td>
                    </tr>
                    <tr>
                        <th>Población</th>
                        <td>{{$expediente->poblacion}}</td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td>{{$expediente->telefono}}</td>
                    </tr>
                    <tr>
                        <th>Correo electrónico</th>
                        <td>{{$expediente->email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm mr-2" href="{{route('admin.expedientes.edit', $expediente)}}">Editar expediente</a>
            <form action="{{route('admin.expedientes.destroy', $expediente)}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Confirma que deseas eliminar el expediente - se eliminarán también las atenciones del mismo');">Eliminar expediente</button>
            </form>
        </div>
    </div>

    <h4>Usuario</h4>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <td>{{$expediente->usuario->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Anotaciones</th>
                        <td>{{$expediente->usuario->anotaciones}}</td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td>{{$expediente->usuario->sexo->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Municipio / Isla</th>
                        <td>{{$expediente->usuario->municipio->nombre}}</td>
                    </tr>
                    <tr>
                        <th>País de origen</th>
                        <td>{{$expediente->usuario->paisorigen->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Nacionalidad</th>
                        <td>{{$expediente->usuario->paisnacionalidad->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Beneficiario directo?</th>
                        @if ($expediente->usuario->beneficiario_directo)
                            <td>{{'Sí'}}</td>
                        @else
                            <td>{{'No'}}</td>   
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h4>Atenciones del expediente</h4>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.consultas.createexp', [$expediente->usuario, $expediente->id])}}">Generar nueva atención</a>
        </div>
        <div class="card-body">
            {{-- TO.DO ordenar consultas desc --}}
            @if ($expediente->usuario->consultas->count())
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Comentarios</th>
                        <th>Tipo</th>
                        <th colspan="2"></th>
                    </thead>
                    <tbody>
                        @foreach ($expediente->usuario->consultas as $consulta)
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
                <p>No hay atenciones para este expediente.</p> 
            @endif

        </div>
    </div>
    {{-- fin atenciones --}}

    <h4>Archivos del expediente</h4>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.archivos.createExp', $expediente)}}">Adjuntar nuevo archivo</a>
        </div>
        <div class="card-body">
            @if ($expediente->archivos->count())
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th colspan="3"></th>
                    </thead>
                    <tbody>
                        @foreach ($expediente->archivos as $archivo)
                            <tr>
                                <td>{{$archivo->id}}</td>
                                <td>{{$archivo->nombre}}</td>
                                {{-- <td>{{$archivo->tipo}}</td> --}}
                                <td><i class="far {{$archivo->font_awesome_icon}} text-lg"></i></td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="">Ver</a>
                                </td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="">Descargar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('admin.archivos.destroy', $archivo)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Confirma que deseas eliminar el archivo');">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay archivos para este expediente.</p> 
            @endif

        </div>
    </div>
    {{-- fin archivos --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop