@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')
<a href="sales/create" class="btn btn-primary">Agregar</a>
<br><br>
{{--Tabla Datos--}}
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $sale->Product->name }}</td>
                                <td>{{ $sale->qty }}</td>
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
<link rel="stylesheet" href="{{asset('vendor/css/app.css')}}">
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
