@extends('layout')
@section('header')
<div class="page-header">
        <h1>Historico #{{$historico->ID_HISTORICO}}</h1>
        <form action="{{ route('historicos.destroy', $historico->ID_HISTORICO) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('historicos.edit', $historico->ID_HISTORICO) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Eliminar<i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="#">
                <div class="form-group">
                     <label for="nombre">NOMBRE: </label>
                     <p class="form-control-static">{{$historico->NOMBRE_HISTORICO}}</p>
                </div>
                    <div class="form-group">
                     <label for="fechainicio">FECHA INICIO: </label>
                     <p class="form-control-static">{{$historico->FECHA_INICIO}}</p>
                </div>
                    <div class="form-group">
                     <label for="fechafinal">FECHA FINAL: </label>
                     <p class="form-control-static">{{$historico->FECHA_FINAL}}</p>
                </div>
                    <div class="form-group">
                     <label for="duraciontotal">DURACION TOTAL: </label>
                     <p class="form-control-static">{{$historico->DURACION_TOTAL}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('historicos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Volver</a>

        </div>
    </div>

@endsection