@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
<h2>Editar Cliente</h2>
<form action="/proveedores/{{$proveedor->id}}" method="POST">    
    @csrf
    @method('PUT')
    <div >
        <x-adminlte-input name="nombre" id="nombre" label="Nombre"  label-class="text-primary" value="{{$proveedores->name}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-primary"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="numero" id="numero" label="Numero" label-class="text-danger" value="{{$proveedores->number}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hashtag text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="email" id="email" label="Email"  label-class="text-success" value="{{$proveedores->email}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="producto" id="producto" label="Producto"  label-class="text-warning" value="{{$proveedores->product}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-cart-shopping text-warning"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="descripcion" id="descripcion" label="Descripcion/Rol"  label-class="text-info" value="{{$proveedores->description}}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-pen text-info"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
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