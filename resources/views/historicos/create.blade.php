@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Historicos / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('historicos.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label for="nombre-field">Nombre:</label>
                    <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ old("nombre") }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fechainicio')) has-error @endif">
                       <label for="fechainicio-field">Fecha Inicio:</label>
                    <input type="date" id="fechainicio-field" name="fechainicio" class="form-control" value="{{ old("fechainicio") }}"/>
                       @if($errors->has("fechainicio"))
                        <span class="help-block">{{ $errors->first("fechainicio") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fechafinal')) has-error @endif">
                       <label for="fechafinal-field">Fecha Final:</label>
                    <input type="date" id="fechafinal-field" name="fechafinal" class="form-control" value="{{ old("fechafinal") }}"/>
                       @if($errors->has("fechafinal"))
                        <span class="help-block">{{ $errors->first("fechafinal") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duraciontotal')) has-error @endif">
                       <label for="duraciontotal-field">Duracion Total:</label>
                    <input type="text" id="duraciontotal-field" name="duraciontotal" class="form-control" value="{{ old("duraciontotal") }}"/>
                       @if($errors->has("duraciontotal"))
                        <span class="help-block">{{ $errors->first("duraciontotal") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <a class="btn btn-link pull-right" href="{{ route('historicos.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection