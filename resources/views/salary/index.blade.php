@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Salarios</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
                <a href="salary.create" class="btn btn-primary">Agregar Cliente</a>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('vendor/css/app.css')}}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop