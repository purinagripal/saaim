@extends('adminlte::page')

@section('title', 'Atenciones')

@section('content_header')
    <h1>Lista de atenciones</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.consultas-index')

@stop