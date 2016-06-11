@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Histórico {{$historico->NOMBRE_HISTORICO}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('historicos.update', $historico->ID_HISTORICO) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label for="nombre-field">Nombre: </label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ $historico->NOMBRE_HISTORICO }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fechainicio')) has-error @endif">
                       <label for="fechainicio-field">Fecha Inicio:</label>
                    <input type="date" id="fechainicio-field" name="fechainicio" class="form-control" value="{{ $historico->FECHA_INICIO }}"/>
                       @if($errors->has("fechainicio"))
                        <span class="help-block">{{ $errors->first("fechainicio") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fechafinal')) has-error @endif">
                       <label for="fechafinal-field">Fecha Final:</label>
                    <input type="date" id="fechafinal-field" name="fechafinal" class="form-control" value="{{ $historico->FECHA_FINAL }}"/>
                       @if($errors->has("fechafinal"))
                        <span class="help-block">{{ $errors->first("fechafinal") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duraciontotal')) has-error @endif">
                       <label for="duraciontotal-field">Duracion Total:</label>
                    <input type="text" id="duraciontotal-field" name="duraciontotal" class="form-control" value="{{ $historico->DURACION_TOTAL }}"/>
                       @if($errors->has("duraciontotal"))
                        <span class="help-block">{{ $errors->first("duraciontotal") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('historicos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Volver</a>
                </div>
            </form>

        </div>
    </div>
@endsection