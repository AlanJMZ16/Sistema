@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Inventario</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
                <a href="products/create" class="btn btn-primary">Agregar</a>
                <br><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio de Compra</th>
                            <th scope="col">Precio de Venta</th>
                            <th scope="col">Descripcion</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($products as $product)
                        <tr class="">
                            <td scope="row">{{$product->id}}</td>
                            <td>{{$product->Categoria->name}}</td>
                            <td>{{$product->Proveedor->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->stock}}</td>
                            <td>{{$product->buy_price}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->timestamp}}</td>
                            <td>
                                <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                    <a class="btn btn-outline-info" href="/products/{{$product->id}}/edit">
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
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('vendor/css/app.css')}}">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop