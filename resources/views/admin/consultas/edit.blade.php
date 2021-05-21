@extends('adminlte::page')

@section('title', 'Editar atención')

@section('content_header')
    <h1>Editar atención</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        {!! Form::model($consulta, ['route' => ['admin.consultas.update', $consulta], 'method' => 'put']) !!}

            @include('admin.consultas.partials.consultaform')

            @if ($consulta->usuario->expediente)
                {{-- si tiene expediente lo muestra pero no deja editarlo --}}
                <div class="card-body">
                    {!! Form::submit('Guardar atención', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

                @include('admin.consultas.partials.expedienteshow')
                
            @else
                {{-- si no tiene expediente puede editar el usuario --}}
                @include('admin.consultas.partials.usuarioform')

                <div class="card-footer">
                    {!! Form::submit('Guardar atención', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            @endif

    </div>

@stop