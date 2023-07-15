@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    <a href="categories/create" class="btn btn-primary">Agregar</a>
    <br><br>
    <table class="table table-dark table-striped">
        <thead class="table-border-bottom">
            <tr>
                <th  scope="col">ID</th>
                <th  scope="col">Nombre</th>
                <th  scope="col">Descripcion</th>
                <th  scope="col">Fecha</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($categories as $category)
            <tr class="">
                <td scope="row">{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->added_at}}</td>
                <td>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                        <a class="btn btn-outline-info" href="/categories/{{$category->id}}/edit">
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