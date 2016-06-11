@extends('layout')
@section('header')
<div class="page-header">
        <h1>Usuario #{{$usuario->id}}</h1>
        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('usuarios.edit', $usuario->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                     <label for="nombre">NOMBRE</label>
                     <p class="form-control-static">{{$usuario->NOMBRE_USUARIO}}</p>
                </div>
                    <div class="form-group">
                     <label for="apellidos">APELLIDOS</label>
                     <p class="form-control-static">{{$usuario->APELLIDO}}</p>
                </div>
                    <div class="form-group">
                     <label for="correo">CORREO</label>
                     <p class="form-control-static">{{$usuario->CORREO}}</p>
                </div>
                    <div class="form-group">
                     <label for="contrasena">CONTRASENA</label>
                     <p class="form-control-static">{{$usuario->CONTRASENNA}}</p>
                </div>
                    <div class="form-group">
                     <label for="tipo">TIPO</label>
                     <p class="form-control-static">{{$usuario->TIPO}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('usuarios.index') }}"><i class="glyphicon glyphicon-backward"></i>  Volver</a>

        </div>
    </div>

@endsection