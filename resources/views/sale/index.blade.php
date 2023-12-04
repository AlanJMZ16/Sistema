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
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($sales as $sale)
                            <tr class="">
                                <td scope="row">{{ $sale->Product->name }}</td>
                                <td>{{ $sale->qty }}</td>
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
                
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="{{asset('vendor/css/app.css')}}">
@stop

@section('js')
    
@stop
