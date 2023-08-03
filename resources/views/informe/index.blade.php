@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Reporte de Ventas</h1>
@stop

@section('content')
<h1></h1>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('informe.index') }}" method="GET">
                <button class="btn btn-primary" type="submit">Generar Reporte</button>
                <x-adminlte-select id="intervalo" name="intervalo" label="Intervalo" label-class="text-lightblue"
                igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-file"></i>
                        </div>
                    </x-slot>
                    <option value="diario">Diario</option>
                    <option value="semanal">Semanal</option>
                    <option value="mensual">Mensual</option>
                </x-adminlte-select>
            </form>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Ventas</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($ventas as $venta)
                            <tr>
                                <td>{{ $venta->added_at }}</td>
                                <td>{{ $venta->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
        
    </script>
@stop
