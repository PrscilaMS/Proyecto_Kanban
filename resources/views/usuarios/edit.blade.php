@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Usuarios / Editar #{{$usuario->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label for="nombre-field">Nombre</label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ $usuario->nombre }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('apellidos')) has-error @endif">
                       <label for="apellidos-field">Apellidos</label>
                    <input type="text" id="apellidos-field" name="apellidos" class="form-control" value="{{ $usuario->apellidos }}"/>
                       @if($errors->has("apellidos"))
                        <span class="help-block">{{ $errors->first("apellidos") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('correo')) has-error @endif">
                       <label for="correo-field">Correo</label>
                    <input type="text" id="correo-field" name="correo" class="form-control" value="{{ $usuario->correo }}"/>
                       @if($errors->has("correo"))
                        <span class="help-block">{{ $errors->first("correo") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('contrasena')) has-error @endif">
                       <label for="contrasena-field">Contrasena</label>
                    <input type="text" id="contrasena-field" name="contrasena" class="form-control" value="{{ $usuario->contrasena }}"/>
                       @if($errors->has("contrasena"))
                        <span class="help-block">{{ $errors->first("contrasena") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('tipo')) has-error @endif">
                       <label for="tipo-field">Tipo</label>
                    <input type="text" id="tipo-field" name="tipo" class="form-control" value="{{ $usuario->tipo }}"/>
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