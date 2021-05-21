@extends('adminlte::page')

@section('title', 'Crear atención')

@section('content_header')
    <h1>Nueva atención</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => 'admin.consultas.store']) !!}

            {!! Form::hidden('seguimiento', $value = 0) !!}

            @include('admin.consultas.partials.consultaform')
            @include('admin.consultas.partials.usuarioform')

            <div class="card-footer">
                {!! Form::submit('Crear atención', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop