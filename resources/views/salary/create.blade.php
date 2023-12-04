@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Salarios</h1>
@stop

@section('content')
<h2>Agregar Trabajador</h2>
<form action="/salaries" method="post">
    @csrf
<div >
    <x-adminlte-input name="name_w" id="name_w" label="Nombre" placeholder="Nombre" label-class="text-primary">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-bars text-primary"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="payment" id="payment" label="Pago(por hora)" placeholder="Pago" label-class="text-secondary">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-bars text-secondary"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="hours" id="hours" label="Horas" placeholder="Horas" label-class="text-success">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-bars text-success"></i>
                </div>
            </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="total" id="total" label="Salario" placeholder="salario" label-class="text-info">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-bars text-info"></i>
            </div>
        </x-slot>
</x-adminlte-input>
</div>
<a href="/salaries" class="btn btn-outline-secondary">Cancelar</a>
<button type="submit" class="btn btn-outline-info">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
            const cantidadPago = document.getElementById('payment');
            const cantidadHoras = document.getElementById('hours');
            const totalInput = document.getElementById('total');

            function calcularTotal() {
                const cantidad = parseFloat(cantidadPago.value);
                const horas = parseFloat(cantidadHoras.value);

                let total = cantidad * horas;
                totalInput.value = total.toFixed(2);
            }

            cantidadPago.addEventListener('input', calcularTotal);
            cantidadHoras.addEventListener('input', calcularTotal);
    });
    </script>
@stop