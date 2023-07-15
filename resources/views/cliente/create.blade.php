@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cliente</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <h2>Agregar Cliente</h2>
                    <form action="/clientes" method="post">
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
                        <x-adminlte-textarea name="descripcion" label="Descripcion" rows=5 label-class="text-info"
                    igroup-size="sm" placeholder="Insertar descripcion...">
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
            </div>
        </div>
    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop