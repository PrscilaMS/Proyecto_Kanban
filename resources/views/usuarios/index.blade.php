@extends('layout')
<head>
     <link rel="stylesheet" href="/css/main.css" />
</head>
@section('header')
@include('flash::message')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-user"></i> Usuarios
            <a class="btn pull-right" href="{{ route('usuarios.create') }}"><h4><i class="glyphicon glyphicon-plus"></i> Crear</h4></a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($usuarios->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                        <th>APELLIDOS</th>
                        <th>CORREO</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->NOMBRE_USUARIO}}</td>
                    <td>{{$usuario->APELLIDO}}</td>
                    <td>{{$usuario->CORREO}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('usuarios.show', $usuario->CORREO) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                                    <form action="{{ route('usuarios.destroy', $usuario->CORREO) }}" method="POST" style="display: inline;" onsubmit="if(confirm('¿Esta seguro que desea eliminar este elemnto?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $usuarios->render() !!}
            @else
                <h3 class="text-center alert alert-info">No hay usaurios!</h3>
            @endif

        </div>
    </div>

@endsection