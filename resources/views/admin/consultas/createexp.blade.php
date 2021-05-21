@extends('adminlte::page')

@section('title', 'Crear atención de expediente')

@section('content_header')
    <h1>Nueva atención de usuario</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => ['admin.consultas.storeexp', $usuario]]) !!}

            {!! Form::hidden('seguimiento', $value = 1) !!}
            {!! Form::hidden('expedienteid', $expedienteid) !!}
            
            @include('admin.consultas.partials.consultaform')

            <div class="card-footer">
                {!! Form::submit('Crear atención', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop