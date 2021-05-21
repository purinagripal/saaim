@extends('adminlte::page')

@section('title', 'Crear expediente')

@section('content_header')
    <h1>Crear nuevo expediente</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => ['admin.expedientes.storeUsu', $usuario]]) !!}

            @include('admin.expedientes.partials.expedienteform')

            @include('admin.expedientes.partials.usuarioshow')
            
            <div class="card-footer">
                {!! Form::submit('Crear expediente', ['class' => 'btn btn-primary', 'name' => 'submit_expediente']) !!}
                {!! Form::submit('Crear expediente y generar atención', ['class' => 'btn btn-primary', 'name' => 'submit_consulta']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop