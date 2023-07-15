@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<form action="/sales" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label text-dark-blue">Proveedor</label>
        <select name="idproveedor" id="" class="form-control">
          @foreach ($proveedores as $proveedor)
          <option value="{{$proveedor->id}}"">{{$proveedor->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label text-dark-blue">Producto</label>
        <select name="idproducto" id="" class="form-control">
          @foreach ($productos as $producto)
          <option value="{{$producto->id}}"">{{$producto->name}}</option>
          @endforeach
        </select>
    </div>
    {{--
    <x-adminlte-input name="producto" id="producto" label="Producto" placeholder="producto" label-class="text-primary">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-bars text-primary"></i>
            </div>
        </x-slot>
    </x-adminlte-input>--}}
    <x-adminlte-input name="cantidad" id="cantidad" label="Cantidad" placeholder="cantidad" label-class="text-primary">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-bars text-primary"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="precio" id="precio" label="Precio" placeholder=".00" label-class="text-danger" input-class="calculateTotal">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-dollar-sing text-danger"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="disableTaxes" onchange="toggleTaxes()">
        <label class="form-check-label" for="disableTaxes">Deshabilitar IVA</label>
    </div>
    <x-adminlte-input name="total" id="total" label="Total" placeholder=".00" label-class="text-success" disabled>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-dollar-sign text-success"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
</div>
<a href="/sales" class="btn btn-outline-secondary">Cancelar</a>
<button type="submit" class="btn btn-outline-info">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop