@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proveedor</h1>
@stop

@section('content')
    <a href="proveedores/create" class="btn btn-primary">Agregar</a>
    <br><br>
<div class="table-responsive">
    <table class="table table-light table-striped">
        <table class="table table-dark table-striped">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Numero</th>
                <th scope="col">Email</th>
                <th scope="col">Producto(s)</th>
                <th scope="col">Descripcion/Rol</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($proveedores as $proveedor)
            <tr class="">
                <td scope="row">{{$proveedor->id}}</td>
                <td>{{$proveedor->name}}</td>
                <td>{{$proveedor->number}}</td>
                <td>{{$proveedor->email}}</td>
                <td>{{$proveedor->product}}</td>
                <td>{{$proveedor->description}}</td>
                <td>
                    <form action="{{route('proveedores.destroy',$proveedor->id)}}" method="POST">
                    <a class="btn btn-outline-info" href="/proveedores/{{$proveedor->id}}/edit">
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop