@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    <h2>Agregar Categoria</h2>
    <form action="/categories" method="post">
        @csrf
    <div >
        <x-adminlte-input name="nombre" id="nombre" label="Categoria" placeholder="categoria" label-class="text-primary">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-bars text-primary"></i>
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
    <a href="/categories" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-outline-info">Guardar</button>
</form>
@stop

@section('css')
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop