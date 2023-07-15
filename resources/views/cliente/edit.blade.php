@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
<h2>Editar Cliente</h2>
<form action="/clientes/{{$clientes->id}}" method="POST">    
    @csrf
    @method('PUT')
    <div >
        <x-adminlte-input name="nombre" id="nombre" label="Nombre"  label-class="text-primary" value="{{$clientes->name}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-primary"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="numero" id="numero" label="Numero" label-class="text-danger" value="{{$clientes->number}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hashtag text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="email" id="email" label="Emal"  label-class="text-success" value="{{$clientes->email}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-textarea name="descripcion" label="Descripcion" rows=5 label-class="text-info"
    igroup-size="sm" value="{{$clientes->description}}">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-light">
            <i class="fas fa-lg fa-file-alt text-info"></i>
        </div>
    </x-slot>
</x-adminlte-textarea>
    </div>
    <a href="/clientes" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-outline-info">Guardar</button>
 </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop