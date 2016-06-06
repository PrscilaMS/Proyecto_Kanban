@extends('layout')
<head>
     <link rel="stylesheet" href="/css/main.css" />
</head>
@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Usuarios
            <a class="btn btn-success pull-right" href="{{ route('usuarios.create') }}"><i class="glyphicon glyphicon-plus"></i> Crear Usuario</a>
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
                        <th>CONTRASEÑA</th>
                        <th>TIPO</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario[0]->NOMBRE_USUARIO}}</td>
                    <td>{{$usuario[0]->APELLIDO}}</td>
                    <td>{{$usuario[0]->CORREO}}</td>
                    <td>{{$usuario[0]->CONTRASENNA}}</td>
                    <td>{{$usuario[0]->TIPO}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('usuarios.show', $usuario[0]->CORREO) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('usuarios.edit', $usuario[0]->CORREO) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                    <form action="{{ route('usuarios.destroy', $usuario[0]->CORREO) }}" method="POST" style="display: inline;" onsubmit="if(confirm('¿Esta seguro que desea eliminar este elemnto?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
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