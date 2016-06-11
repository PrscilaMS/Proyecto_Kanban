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
                       <label for="nombre-field">Nombre</label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ old("nombre") }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                </div>
                <div class="form-group @if($errors->has('fechainicio')) has-error @endif">
                       <label for="fechainicio-field">Fecha Inicio</label>
                    <input type="date" id="fechainicio-field" name="fechainicio" class="form-control" value="{{ old("fechainicio") }}"/>
                       @if($errors->has("fechainicio"))
                        <span class="help-block">{{ $errors->first("fechainicio") }}</span>
                       @endif
                </div>
                <div class="form-group">
                    <label for="selectTallas">Equipo</label>
                    <select name="equipo">
                      @foreach($equipos as $equipo)
                      
                       <option class="form-control" value="{{$equipo->ID_EQUIPO}}">{{$equipo->NOMBRE_EQUIPO}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Continuar</button>
                    <a class="btn btn-link pull-right" href="{{ route('proyectos.index') }}"><i class="glyphicon glyphicon-backward"></i> Volve</a>
                </div>
            </form>

        </div>
    </div>
@endsection