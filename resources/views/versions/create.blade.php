@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Crear Versión </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('versions.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('numero')) has-error @endif">
                       <label for="numero-field">Numero</label>
                    <input type="text" id="numero-field" name="numero" class="form-control" value="{{ old("numero") }}"/>
                       @if($errors->has("numero"))
                        <span class="help-block">{{ $errors->first("numero") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('esfuerzohoras')) has-error @endif">
                       <label for="esfuerzohoras-field">EsfuerzoHoras</label>
                    <input type="text" id="esfuerzohoras-field" name="esfuerzohoras" class="form-control" value="{{ old("esfuerzohoras") }}"/>
                       @if($errors->has("esfuerzohoras"))
                        <span class="help-block">{{ $errors->first("esfuerzohoras") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('esfuerzotalla')) has-error @endif">
                       <label for="esfuerzotalla-field">EsfuerzoTalla</label>
                    <input type="text" id="esfuerzotalla-field" name="esfuerzotalla" class="form-control" value="{{ old("esfuerzotalla") }}"/>
                       @if($errors->has("esfuerzotalla"))
                        <span class="help-block">{{ $errors->first("esfuerzotalla") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duracion')) has-error @endif">
                       <label for="duracion-field">Duracion</label>
                    <input type="text" id="duracion-field" name="duracion" class="form-control" value="{{ old("duracion") }}"/>
                       @if($errors->has("duracion"))
                        <span class="help-block">{{ $errors->first("duracion") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('fechafinal')) has-error @endif">
                       <label for="fechafinal-field">FechaFinal</label>
                    <input type="text" id="fechafinal-field" name="fechafinal" class="form-control" value="{{ old("fechafinal") }}"/>
                       @if($errors->has("fechafinal"))
                        <span class="help-block">{{ $errors->first("fechafinal") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('versions.index') }}"><i class="glyphicon glyphicon-backward"></i> Volver</a>
                </div>
            </form>

        </div>
    </div>
@endsection