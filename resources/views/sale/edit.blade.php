@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <h2>Editar Venta</h2>
                <form action="/sales/{{$sales->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="idcliente" class="form-label text-lightblue">Cliente</label>
                        <select name="idcliente" id="idcliente" class="form-control">
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $sales->cliente_id == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="anonimo" onchange="usAnonimo()" value="false">
                        <label class="form-check-label" for="anonimo">Cliente sin registro</label>
                    </div>
                    <div class="mb-3">
                        <label for="idproducto" class="form-label text-dark-blue">Producto</label>
                        <select name="idproducto" id="idproducto" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $sales->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <x-adminlte-input name="cantidad" id="cantidad" label="Cantidad" value="{{ $sales->qty }}" label-class="text-primary">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-bars text-primary"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-input name="precio" id="precio" label="Precio" value="{{ $sales->price }}" label-class="text-danger" input-class="calculateTotal">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-dollar-sing text-danger"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-input name="total" id="total" label="Total" value="{{ $sales->total }}" label-class="text-success" disabled>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-dollar-sign text-success"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    <a href="/sales" class="btn btn-outline-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-outline-info">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var productos = @json($products); // Convertir la lista de productos a JSON para usar en JavaScript
        
        // Función para actualizar el precio cuando se selecciona un producto
        function actualizarPrecio() {
            var idProductoSeleccionado = document.getElementById('idproducto').value;
            var precioInput = document.getElementById('precio');
            
            // Buscar el producto seleccionado en la lista de productos
            var productoSeleccionado = productos.find(function(producto) {
                return producto.id == idProductoSeleccionado;
            });
            
            // Actualizar el valor del campo de precio con el precio del producto seleccionado
            if (productoSeleccionado) {
                precioInput.value = productoSeleccionado.sale_price;
                calcularTotal(); // Llamar a la función para calcular el total después de actualizar el precio
            }
        }
        
        // Llamar a la función al cargar la página y cuando se cambie el producto seleccionado
        actualizarPrecio();
        document.getElementById('idproducto').addEventListener('change', actualizarPrecio);
        
        // Función para calcular el total basado en la cantidad y el precio
        function calcularTotal() {
            var cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
            var precio = parseFloat(document.getElementById('precio').value) || 0;
            var totalInput = document.getElementById('total');
            
            var total = cantidad * precio;
            totalInput.value = total.toFixed(2); // Mostrar el total con 2 decimales
        }
        
        // Llamar a la función para calcular el total cuando se cambie la cantidad o el precio
        document.getElementById('cantidad').addEventListener('input', calcularTotal);
        document.getElementById('precio').addEventListener('input', calcularTotal);
    });
</script>

<script>
function usAnonimo(){
    var clienteSelect=document.getElementById('idcliente');
    var disableCheckbox=document.getElementById('anonimo');

    clienteSelect.disabled=disableCheckbox.checked;

    clienteSelect="anonimo";
}
</script>
@stop
