@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Crear Usuario </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('usuarios.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label for="nombre-field">Nombre</label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ old("nombre") }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('apellidos')) has-error @endif">
                       <label for="apellidos-field">Apellidos</label>
                    <input type="text" id="apellidos-field" name="apellidos" class="form-control" value="{{ old("apellidos") }}"/>
                       @if($errors->has("apellidos"))
                        <span class="help-block">{{ $errors->first("apellidos") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('correo')) has-error @endif">
                       <label for="correo-field">Correo</label>
                    <input type="email" id="correo-field" name="correo" class="form-control" value="{{ old("correo") }}"/>
                       @if($errors->has("correo"))
                        <span class="help-block">{{ $errors->first("correo") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('contrasena')) has-error @endif">
                       <label for="contrasena-field">Contrasena</label>
                    <input type="password" id="contrasena-field" name="contrasena" class="form-control" value="{{ old("contrasena") }}"/>
                       @if($errors->has("contrasena"))
                        <span class="help-block">{{ $errors->first("contrasena") }}</span>
                       @endif
                    </div>
                    <select class="selectpicker" name="tipo" id="tipo">
                        <option value="admin">Administrador</option>
                        <option value="usuario">Usuario</option>
                    </select>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('usuarios.index') }}"><i class="glyphicon glyphicon-backward"></i> Volver</a>
                </div>
            </form>

        </div>
    </div>
@endsection