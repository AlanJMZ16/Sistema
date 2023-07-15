@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cliente</h1>
@stop

@section('content')
    <a href="clientes/create" class="btn btn-primary">Agregar</a>
    <br><br>
<div class="table-responsive">
    <table class="table table-light table-striped">
        <table class="table table-dark table-striped">
            <thead class="table-border-bottom">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Numero</th>
                <th scope="col">Email</th>
                <th scope="col">Descripcion/Rol</th>
                <th>ACCIONES</th>
                </tr>
            </thead>
        <tbody class="table-group-divider">
            @foreach ($clientes as $cliente)
            <tr class="">
                <td scope="row">{{$cliente->id}}</td>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->number}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->description}}</td>
                <td>
                    <form action="{{route('clientes.destroy',$cliente->id)}}" method="POST">
                    <a class="btn btn-outline-info" href="/clientes/{{$cliente->id}}/edit">
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
    <link rel="stylesheet" href="{{asset('vendor/css/app.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop