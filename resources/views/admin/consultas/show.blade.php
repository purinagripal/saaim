@extends('adminlte::page')

@section('title', 'Mostrar atención')

@section('content_header')
    <h1>Atención</h1>
@stop

@section('content')
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{$consulta->id}}</td>
                    </tr>
                    <tr>
                        <th>Fecha</th>
                        <td>{{$consulta->fecha}}</td>
                    </tr>
                    <tr>
                        <th>Comentarios</th>
                        <td>{{$consulta->comentarios}}</td>
                    </tr>
                    <tr>
                        <th>Tipo</th>
                        <td>{{$consulta->tipo->nombre}}</td>
                    </tr>
                    {{-- <tr>
                        <th>Seguimiento</th>
                        @if ($consulta->seguimiento)
                            <td>Sí</td>
                        @else
                            <td>No</td>
                        @endif
                    </tr> --}}
                    <tr>
                        <th>Motivos de consulta</th>
                        <td>
                            @foreach ($consulta->motivos as $motivo)
                                @if (!$loop->first)
                                    {{' - '}}
                                @endif
                                {{$motivo->nombre}}
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>Trámites generados</th>
                        <td>
                            @foreach ($consulta->tramites as $tramite)
                                @if (!$loop->first)
                                    {{' - '}}
                                @endif
                                {{$tramite->nombre}}
                            @endforeach
                        </td>
                    </tr>
                       
                </tbody>
            </table>
        </div>
        <div class="card-footer d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm mr-2" href="{{route('admin.consultas.edit', $consulta)}}">Editar atención</a>
            <form action="{{route('admin.consultas.destroy', $consulta)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Confirma que deseas eliminar la atención');">Eliminar atención</button>
            </form>
        </div>
    </div>
    
    @if ($consulta->usuario->expediente)
        <h4>Expediente</h4>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Número de expediente</th>
                            <td>{{$consulta->usuario->expediente->num_expediente}}</td>
                        </tr>
                        <tr>
                            <th>Nombre</th>
                            <td>{{$consulta->usuario->expediente->nombre}}</td>
                        </tr>
                        <tr>
                            <th>Apellidos</th>
                            <td>{{$consulta->usuario->expediente->apellidos}}</td>
                        </tr>
                        <tr>
                            <th>Fecha de nacimiento</th>
                            <td>{{$consulta->usuario->expediente->fecha_nacimiento}}</td>
                        </tr>
                        <tr>
                            <th>Documento de identidad</th>
                            <td>{{$consulta->usuario->expediente->doc_identif}}</td>
                        </tr>
                        <tr>
                            <th>Domicilio</th>
                            <td>{{$consulta->usuario->expediente->domicilio}}</td>
                        </tr>
                        <tr>
                            <th>Código Postal</th>
                            <td>{{$consulta->usuario->expediente->codigo_postal}}</td>
                        </tr>
                        <tr>
                            <th>Población</th>
                            <td>{{$consulta->usuario->expediente->poblacion}}</td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td>{{$consulta->usuario->expediente->telefono}}</td>
                        </tr>
                        <tr>
                            <th>Correo electrónico</th>
                            <td>{{$consulta->usuario->expediente->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm mr-2" href="{{route('admin.expedientes.show', $consulta->usuario->expediente)}}">Ver expediente</a>
                <a class="btn btn-primary btn-sm mr-2" href="{{route('admin.expedientes.edit', $consulta->usuario->expediente)}}">Editar expediente</a>
            </div>
        </div>
    @endif

    <h4>Usuario</h4>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Nombre</th>
                        <td>{{$consulta->usuario->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Anotaciones</th>
                        <td>{{$consulta->usuario->anotaciones}}</td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td>{{$consulta->usuario->sexo->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Municipio / Isla</th>
                        <td>{{$consulta->usuario->municipio->nombre}}</td>
                    </tr>
                    <tr>
                        <th>País de origen</th>
                        <td>{{$consulta->usuario->paisorigen->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Nacionalidad</th>
                        <td>{{$consulta->usuario->paisnacionalidad->nombre}}</td>
                    </tr>
                    <tr>
                        <th>Beneficiario directo?</th>
                        @if ($consulta->usuario->beneficiario_directo)
                            <td>{{'Sí'}}</td>
                        @else
                            <td>{{'No'}}</td>   
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    

@stop