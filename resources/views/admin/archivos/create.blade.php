@extends('adminlte::page')

@section('title', 'Adjuntar archivo a expediente')

@section('content_header')
    <h1>Nuevo archivo para {{$expediente->nombre.' '.$expediente->apellidos}}</h1>
@stop

@section('content')
    <div class="card">
        {!! Form::open(['route' => ['admin.archivos.store'], 'autocomplete' => 'off', 'files' => true]) !!}

            {!! Form::hidden('expediente_id', $expediente->id) !!}
            
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre descriptivo']) !!}
                    @error('nombre')
                        <small class="text-danger">{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('archivo', 'Archivo a adjuntar') !!}
                    {!! Form::file('archivo', ['class' => 'form-control-file']) !!}
                    @error('archivo')
                        <small class="text-danger">{{$message}}</small>    
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Subir archivo', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop