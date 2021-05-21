@extends('adminlte::page')

@section('title', 'Expedientes')

@section('content_header')
    <h1>Lista de expedientes</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.expedientes-index')

@stop