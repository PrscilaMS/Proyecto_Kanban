@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Usuarios #{{$usuario->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('usuarios.update', $usuario->CORREO) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label for="nombre-field">Nombre</label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ $usuario->NOMBRE_USUARIO }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('apellidos')) has-error @endif">
                       <label for="apellidos-field">Apellidos</label>
                    <input type="text" id="apellidos-field" name="apellidos" class="form-control" value="{{ $usuario->APELLIDO }}"/>
                       @if($errors->has("apellidos"))
                        <span class="help-block">{{ $errors->first("apellidos") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('contrasena')) has-error @endif">
                       <label for="contrasena-field">Contrasena</label>
                    <input type="password" id="contrasena-field" name="contrasena" class="form-control" value="{{ $usuario->CONTRASENNA }}"/>
                       @if($errors->has("contrasena"))
                        <span class="help-block">{{ $errors->first("contrasena") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('tipo')) has-error @endif">
                       <label for="tipo-field">Tipo</label>
                    <input type="text" id="tipo-field" name="tipo" class="form-control" value="{{ $usuario->TIPO }}"/>
                       @if($errors->has("tipo"))
                        <span class="help-block">{{ $errors->first("tipo") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('usuarios.index') }}"><i class="glyphicon glyphicon-backward"></i>  Atrás</a>
                </div>
            </form>

        </div>
    </div>
@endsection