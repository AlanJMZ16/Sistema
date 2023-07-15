@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inventario</h1>
@stop

@section('content')

    <h2>Agregar Producto</h2>
<form action="/products" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label text-lightblue">Categoria</label>
        <select name="idcategoria" id="" class="form-control">
          @foreach ($categories as $category)
          <option value="{{$category->id}}"">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="" class="form-label text-dark-blue">proveedor</label>
        <select name="idproveedor" id="" class="form-control">
          @foreach ($proveedores as $proveedor)
          <option value="{{$proveedor->id}}"">{{$proveedor->name}}</option>
          @endforeach
        </select>
      </div>
      <x-adminlte-input name="nombre" id="nombre" label="Nombre" placeholder="nombre" label-class="text-secondary">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-box text-secondary"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="stock" id="stock" label="Cantidad" placeholder="cantidad" label-class="text-success">
      <x-slot name="prependSlot">
          <div class="input-group-text">
            <i class="fas fa-boxes text-success"></i>
          </div>
      </x-slot>
  </x-adminlte-input>
  <x-adminlte-input name="precioC" id="precioC" label="Precio Compra" placeholder=".00" label-class="text-info">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-coins text-info"></i>
        </div>
    </x-slot>
</x-adminlte-input>
<x-adminlte-input name="taxes" id="taxes" label="IVA" placeholder="%" label-class="text-warning">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-porcent text-warning"></i>
        </div>
    </x-slot>
</x-adminlte-input>
<x-adminlte-input name="venta" id="venta" label="Precio Venta" placeholder=".00" label-class="text-warning">
  <x-slot name="prependSlot">
      <div class="input-group-text">
          <i class="fas fa-coins text-warning"></i>
      </div>
  </x-slot>
</x-adminlte-input>
<x-adminlte-textarea name="descripcion" label="Descripcion" rows=5 label-class="text-info"
    igroup-size="sm" placeholder="Inserte descripcion...">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-light">
            <i class="fas fa-lg fa-file-alt text-info"></i>
        </div>
    </x-slot>
</x-adminlte-textarea>
      </div>
    <a href="/products" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-outline-info">Guardar</button>
</form>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop