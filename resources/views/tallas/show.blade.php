@extends('layout')
@section('header')
<div class="page-header">
        <h1>Talla #{{$talla->ID_TALLA}}</h1>
        <form action="{{ route('tallas.destroy', $talla->ID_TALLA) }}" method="POST" style="display: inline;" onsubmit="if(confirm('¿Está seguro que desea eliminarlo?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('tallas.edit', $talla->ID_TALLA) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                <button type="submit" class="btn btn-danger">Eliminar <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                     <label for="sigla">SIGLA: </label>
                     <p class="form-control-static">{{$talla->NOMBRE_TALLA}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('tallas.index') }}"><i class="glyphicon glyphicon-backward"></i>  Volver</a>

        </div>
    </div>

@endsection