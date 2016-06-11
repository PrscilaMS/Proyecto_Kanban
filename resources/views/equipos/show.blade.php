@extends('layout')
@section('header')
<div class="page-header">
        <h1>Equipo #{{$equipo->ID_EQUIPO}}</h1>
        @include('flash::message')
        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-sm btn-primary btn-group" role="group" href="{{ route('equipos.edit', $equipo->ID_EQUIPO) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                <button type="submit" class="btn-sm btn-primary">Eliminar <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$equipo->ID_EQUIPO}}</p>
                </div>
                <div class="form-group">
                     <label for="nombre">Nombre</label>
                     <p class="form-control-static">{{$equipo->NOMBRE_EQUIPO}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('equipos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Volver</a>

        </div>
    </div>

@endsection