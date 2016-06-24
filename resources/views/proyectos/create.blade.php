@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Crear Proyecto </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('proyectos.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label class="nombre" for="nombre-field">Nombre</label>
                    <input type="text" id="nombre-field" name="nombre" class="nombre form-control" value="{{ old("nombre") }}" maxlength="40" size="40" required/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                </div>
                <div class="form-group @if($errors->has('fechainicio')) has-error @endif">
                       <label class="fecha" class="fecha" for="fechainicio-field">Fecha Inicio</label>
                    <input type="date" id="fechainicio-field" name="fechainicio" class=" fecha form-control" value="{{ old("fechainicio") }}"/>
                       @if($errors->has("fechainicio"))
                        <span class="help-block">{{ $errors->first("fechainicio") }}</span>
                       @endif
               
                </div>
                 <div class="form-group">
                        <label class="selectContainer" for="selectContainer">Equipo </label>
                        <div class="selectContainer">
                            <select name="equipo" class="form-control">
                                @foreach($equipos as $equipo)
                                  <option value="{{$equipo->ID_EQUIPO}}">{{$equipo->NOMBRE_EQUIPO}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="form-group @if($errors->has('fechainicio')) has-error @endif">
                       <label class="fecha" class="fecha" for="fechainicio-field">Fecha estimación</label>
                    <input type="date" id="fechainicio-field" name="fechainicioestimacion" class=" fecha form-control" value="{{ old("fechainicio") }}"/>
                       @if($errors->has("fechainicio"))
                        <span class="help-block">{{ $errors->first("fechainicio") }}</span>
                       @endif
               
                </div>
                 
                <div class="well well-sm">
                    <button type="submit" class="btn btn-sm btn-primary">Continuar</button>
                    <a class="btn btn-link pull-right" href="{{ route('historicos.index') }}"><i class="glyphicon glyphicon-backward"></i> Volver</a>
                </div>
            </form>

        </div>
    </div>
@endsection