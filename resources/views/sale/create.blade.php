@extends('adminlte::page')

@section('title', 'Agregar Venta')

@section('content_header')
    <h1>Agregar Venta</h1>
@stop

@section('content')
<form action="/sales" method="post">
    @csrf
    @method('POST')
    <div class="mb-3">
        <label for="idproveedor" class="form-label text-lightblue">Proveedor</label>
        <select name="idproveedor" id="idproveedor" class="form-control">
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="idproducto" class="form-label text-dark-blue">Producto</label>
        <select name="idproducto" id="idproducto" class="form-control">
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
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
    <x-adminlte-input name="precio" id="precio" label="Precio" placeholder=".00" label-class="text-danger" input-class="calculateTotal">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-dollar-sing text-danger"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <select name="precio_opcion" id="precio_opcion" class="form-control" onchange="togglePrice()">
        <option value="db">Tomar del inventario</option>
        <option value="nuevo">No inventariado</option>
    </select>
    <x-adminlte-input name="total" id="total" label="Total" placeholder=".00" label-class="text-success" disabled>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-dollar-sign text-success"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <button type="submit" class="btn btn-outline-info">Guardar</button>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    const cantidadInput = document.getElementById('cantidad');
    const precioInput = document.getElementById('precio');
    const totalInput = document.getElementById('total');
    const precioProducto = parseFloat("{{ $precioProducto }}");

    function calculateTotal() {
        const cantidad = parseFloat(cantidadInput.value);

        let precio;
        const precioOpcion = document.getElementById('precio_opcion').value;
        if (precioOpcion === 'db') {
            precio = parseFloat("{{ $precioProducto }}");
        } else {
            precio = parseFloat(precioInput.value);
        }

        let total = cantidad * precio;

        totalInput.value = total.toFixed(2);
    }
    function updateStock(productID, quantity) {
    axios.post(`/update-stock/${productID}`, { quantity })
        .then(response => {
            console.log('Stock updated successfully');
        })
        .catch(error => {
            console.error('Error updating stock:', error);
        });
    }

    cantidadInput.addEventListener('input', calculateTotal);
    precioInput.addEventListener('input', calculateTotal);

    function togglePrice() {
        const priceInput = document.getElementById('precio');
        const precioOpcion = document.getElementById('precio_opcion').value;

        // Actualizar el valor del precio cuando cambie la opción
        if (precioOpcion === 'db') {
            precioInput.value = precioProducto.toFixed(2);
        }
    }

    // Ejecutar la función togglePrice al cargar la vista
    togglePrice();
</script>
@stop