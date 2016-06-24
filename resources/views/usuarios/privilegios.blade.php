@extends('layout')
<head>
     <link rel="stylesheet" href="/css/main.css" />
</head>
@section('header')
@include('flash::message')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-user"></i> Usuarios
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            
            <form action="{{ URL::to('/') }}/buscarPorNombreApellido" method="POST" role="search" class="navbar-form navbar-right">
                
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="buscador" placeholder="Digite el nombre o apellido">
                    <span class="input-group-addon">
						<button type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>  
					</span>
                </div>
                
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
            </form>
            @if($usuarios->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->NOMBRE_USUARIO}}</td>
                    <td>{{$usuario->APELLIDO}}</td>
                    <td>{{$usuario->CORREO}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ URL::to('/') }}/usuarios_equipos"><i class="glyphicon glyphicon-pencil"></i> Modificar privilegios</a>
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