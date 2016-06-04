@extends('layout')
@section('header')
<div class="page-header">
        <h1>TareaHistoricos / Show #{{$tarea_historico->id}}</h1>
        <form action="{{ route('tarea_historicos.destroy', $tarea_historico->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('tarea_historicos.edit', $tarea_historico->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
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
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="nombre">NOMBRE</label>
                     <p class="form-control-static">{{$tarea_historico->nombre}}</p>
                </div>
                    <div class="form-group">
                     <label for="duracionrequerimientos">DURACIONREQUERIMIENTOS</label>
                     <p class="form-control-static">{{$tarea_historico->duracionrequerimientos}}</p>
                </div>
                    <div class="form-group">
                     <label for="duraciondiseno">DURACIONDISENO</label>
                     <p class="form-control-static">{{$tarea_historico->duraciondiseno}}</p>
                </div>
                    <div class="form-group">
                     <label for="duraciondesarrollo">DURACIONDESARROLLO</label>
                     <p class="form-control-static">{{$tarea_historico->duraciondesarrollo}}</p>
                </div>
                    <div class="form-group">
                     <label for="duracionpruebas">DURACIONPRUEBAS</label>
                     <p class="form-control-static">{{$tarea_historico->duracionpruebas}}</p>
                </div>
                    <div class="form-group">
                     <label for="duracionimplementacion">DURACIONIMPLEMENTACION</label>
                     <p class="form-control-static">{{$tarea_historico->duracionimplementacion}}</p>
                </div>
                    <div class="form-group">
                     <label for="duracionmantenimiento">DURACIONMANTENIMIENTO</label>
                     <p class="form-control-static">{{$tarea_historico->duracionmantenimiento}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('tarea_historicos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection