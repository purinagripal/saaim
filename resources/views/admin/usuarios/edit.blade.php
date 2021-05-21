@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        {!! Form::model($usuario, ['route' => ['admin.usuarios.update', $usuario], 'method' => 'put']) !!}

            @include('admin.usuarios.partials.form')
            
            <div class="card-footer">
                {!! Form::submit('Guardar usuario', ['class' => 'btn btn-primary', 'name' => 'submit_usuario']) !!}
                {!! Form::submit('Guardar usuario y generar atención', ['class' => 'btn btn-primary', 'name' => 'submit_consulta']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop