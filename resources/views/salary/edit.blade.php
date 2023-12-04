@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inventario</h1>
@stop

@section('content')
<h2>Editar Trabajador</h2>
<form action="/salaries/{{$salaries->id}}" method="post">
    @csrf
    @method('PUT')
<div >
    <x-adminlte-input name="name_w" id="name_w" label="Nombre" value="{{$salaries->name_w}}" label-class="text-primary">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-bars text-primary"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="payment" id="payment" label="Pago(por hora)" value="{{$salaries->payment}}" label-class="text-secondary">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-bars text-secondary"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="hours" id="hours" label="Horas" value="{{$salaries->hours}}" label-class="text-success">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-bars text-success"></i>
                </div>
            </x-slot>
    </x-adminlte-input>
    <x-adminlte-input name="total" id="total" label="Salario" value="{{$salaries->total}}" label-class="text-info">
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
    <script> console.log('Hi!'); </script>
@stop