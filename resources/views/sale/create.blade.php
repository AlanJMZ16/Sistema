@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Venta</h1>
@stop

@section('content')
<form action="/sales" method="post">
    @csrf
    @method('GET')
    <div class="mb-3">
        <label for="" class="form-label text-lightblue">Proveedor</label>
        <select name="idproveedor" id="" class="form-control">
          @foreach ($proveedores as $proveedor)
          <option value="{{$proveedor->id}}"">{{$proveedor->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label text-dark-blue">Producto</label>
        <select name="idproducto" id="" class="form-control">
          @foreach ($products as $product)
          <option value="{{$product->id}}"">{{$product->name}}</option>
          @endforeach
        </select>
    </div>
    <x-adminlte-input name="cantidad" id="cantidad" label="Cantidad" placeholder="cantidad" label-class="text-primary">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-bars text-primary"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <select name="precio_opcion" id="precio_opcion" class="form-control" onchange="togglePrice()">
        <option value="db">Tomar del inventario</option>
        <option value="nuevo">No inventariado</option>
    </select>
    <x-adminlte-input name="precio" id="precio" label="Precio" placeholder=".00" label-class="text-danger" input-class="calculateTotal" disabled>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-dollar-sing text-danger"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
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
@if ($product->cantidad === 0)
    <p>No hay más stock disponible</p>
@endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script>
    const cantidadInput = document.getElementById('cantidad');
    const precioInput = document.getElementById('precio');
    const totalInput = document.getElementById('total');

    function calculateTotal() {
        const cantidad = parseFloat(cantidadInput.value);

        let precio;
        const precioOpcion = document.getElementById('precio_opcion').value;
        if (precioOpcion === 'db') {
            precio = parseFloat("{{ $precioProducto }}"); // Tomar el precio de la base de datos
        } else {
            precio = parseFloat(precioInput.value); // Tomar el nuevo precio ingresado por el usuario
        }

        let total = cantidad * precio;

        totalInput.value = total.toFixed(2);
    }

    cantidadInput.addEventListener('input', calculateTotal);
    precioInput.addEventListener('input', calculateTotal);

    function togglePrice() {
        var priceInput = document.getElementById('precio');
        var precioOpcion = document.getElementById('precio_opcion').value;

        if (precioOpcion === 'db') {
            priceInput.disabled = true;
        } else {
            priceInput.disabled = false;
        }
    }

    // Ejecutar la función togglePrice al cargar la vista
    togglePrice();
</script>
@stop