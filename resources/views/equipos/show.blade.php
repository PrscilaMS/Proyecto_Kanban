@extends('layout')
@section('header')
<div class="page-header">
        <h1>Equipo {{$equipo->NOMBRE_EQUIPO}}</h1>
        
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-9">
                <div  class="mostarInformacion well well-sm ">
                    <div class="form-group">
                        <label for="nome">ID</label>
                        <p class="form-control-static">{{$equipo->ID_EQUIPO}}</p>
                    </div>
                    <div class="form-group">
                         <label for="nombre">Nombre</label>
                         <p class="form-control-static">{{$equipo->NOMBRE_EQUIPO}}</p>
                    </div>
                </div>
            </div>
             
            
        </div>
    </div>
    <div class="well well-sm">
                <a class="btn btn-link pull-right" href="{{ route('tallas.index') }}"><i class="glyphicon glyphicon-backward"></i> Volver</a>
                <form action="{{ route('equipos.destroy', $equipo->ID_EQUIPO) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Seguro que deseaa eliminar el equipo')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <button type="submit" class="btn btn-danger">Eliminar<i class="glyphicon glyphicon-trash"></i></button>
                    </div>
                </form>
    </div>
@endsection