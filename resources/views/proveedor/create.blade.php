@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proveedor</h1>
@stop

@section('content')
    <h2>Agregar Proveedor</h2>
    <form action="/proveedores" method="post">
        @csrf
    <div >
        <x-adminlte-input name="nombre" id="nombre" label="Nombre" placeholder="nombre" label-class="text-primary">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-primary"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="numero" id="numero" label="Numero" placeholder="numero" label-class="text-danger">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hashtag text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="email" id="email" label="Emal" placeholder="ejemplo@celler.com" label-class="text-success">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-success"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="producto" id="producto" label="Producto" placeholder="producto" label-class="text-warning">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-cart-shopping text-warning"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="descripcion" id="descripcion" label="Descripcion/Rol" placeholder="descripcion/rol" label-class="text-info">
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