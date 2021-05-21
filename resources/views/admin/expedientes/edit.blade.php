@extends('adminlte::page')

@section('title', 'Editar expediente')

@section('content_header')
    <h1>Editar expediente</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        {!! Form::model($expediente, ['route' => ['admin.expedientes.update', $expediente], 'method' => 'put']) !!}

            @include('admin.expedientes.partials.completform')
            
            <div class="card-footer">
                {!! Form::submit('Guardar expediente', ['class' => 'btn btn-primary', 'name' => 'submit_expediente']) !!}
                {!! Form::submit('Guardar expediente y generar atención', ['class' => 'btn btn-primary', 'name' => 'submit_consulta']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop