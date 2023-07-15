@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')
<a href="sales/create" class="btn btn-primary">Agregar</a>
    <br><br>
{{--Formulario para agregar las ventas--}}
{{--
<h2>Agregar Venta</h2>
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
        
        <x-adminlte-input name="producto" id="producto" label="Producto" placeholder="producto" label-class="text-primary">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-bars text-primary"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
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
        <x-adminlte-input name="taxes" id="taxes" label="Iva" placeholder=".00" label-class="text-success" input-class="calculateTotal">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-success"></i>
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
--}}
<br><br>
{{--Tabla Datos--}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">IVA</th>
                                <th scope="col">Total</th>
                                <th scope="col">Fecha</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($sales as $sale)
                            <tr class="">
                                <td scope="row">{{$sale->id}}</td>
                                <td>{{$sale->Product->name}}</td>
                                <td>{{$sale->qty}}</td>
                                <td>{{$sale->price}}</td>
                                <td>{{$sale->tax}}</td>
                                <td>{{$sale->total}}</td>
                                <td>{{$sale->added_at}}</td>
                                <td>
                                    <form action="{{route('sales.destroy',$sale->id)}}" method="POST">
                                        <a class="btn btn-outline-info" href="/sales/{{$sale->id}}/edit">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" >
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br><br>
                {{--Canva de la grafica--}}
                    <div>
                        <canvas id="myChart" width="z200px" height="200px"></canvas>
                    </div>
                    
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {!! json_encode($data) !!},
            options: {}
        });
    </script>
    <script>
        function toggleTaxes() {
            var taxesInput = document.getElementById('taxes');
            var disableCheckbox = document.getElementById('disableTaxes');
    
            taxesInput.disabled = disableCheckbox.checked;
        }
    </script>
    <script>
        const cantidadInput = document.getElementById('cantidad');
        const precioInput = document.getElementById('precio');
        const taxesInput = document.getElementById('taxes');
        const totalInput = document.getElementById('total');
    
        function calculateTotal() {
            const cantidad = parseFloat(cantidadInput.value);
            const precio = parseFloat(precioInput.value);
            const taxes = parseFloat(taxesInput.value);
    
            let total = cantidad * precio;
    
            if (!taxesInput.disabled && !isNaN(taxes)) {
                total += taxes;
            }
    
            totalInput.value = total.toFixed(2);
        }
    
        cantidadInput.addEventListener('input', calculateTotal);
        precioInput.addEventListener('input', calculateTotal);
        taxesInput.addEventListener('input', calculateTotal);
    </script>
@stop
