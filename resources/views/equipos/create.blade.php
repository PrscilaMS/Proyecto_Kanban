@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Crear Equipos </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">
    
            <form action="{{ route('equipos.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group @if($errors->has('nombre')) has-error @endif">
                                   <label for="nombre-field">Nombre</label>
                                   <input type="text" id="nombre-field" name="nombre" class="form-control" value="{{ old("nombre") }}"/>
                                   @if($errors->has("nombre"))
                                    <span class="help-block">{{ $errors->first("nombre") }}</span>
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group @if($errors->has('cantidad')) has-error @endif">
                                   <label class="cantidad" for="cantidad-field">Cantidad</label>
                                <input type="text" id="cantidad-field" name="cantidad" class="cantidad form-control" value="{{ old("cantidad") }}"/>
                                   @if($errors->has("cantidad"))
                                    <span class="help-block">{{ $errors->first("cantidad") }}</span>
                                   @endif
                            </div>
                        </div>
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <a class="btn btn-link pull-right" href="{{ route('equipos.index') }}"><i class="glyphicon glyphicon-backward"></i> Volver</a>
                </div>
            </form>

        </div>
    </div>
@endsection