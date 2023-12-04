@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Salarios</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
                <a href="salaries/create" class="btn btn-primary">Agregar Trabajador</a>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Pago por hora</th>
                                <th scope="col">Horas</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach($salaries as $salary)
                            <tr class="">
                                <td scope="row">{{$salary->name_w}}</td>
                                <td>{{$salary->payment}}</td>
                                <td>{{$salary->hours}}</td>
                                <td>{{$salary->total}}</td>
                                <td>
                                    <form action="{{route('salaries.destroy',$salary->id)}}" method="POST">
                                        <a class="btn btn-outline-info" href="/salaries/{{$salary->id}}/edit">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
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