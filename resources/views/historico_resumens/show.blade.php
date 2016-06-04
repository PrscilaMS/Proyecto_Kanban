@extends('layout')
@section('header')
<div class="page-header">
        <h1>HistoricoResumens / Show #{{$historico_resuman->id}}</h1>
        <form action="{{ route('historico_resumens.destroy', $historico_resuman->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('historico_resumens.edit', $historico_resuman->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="duracionrequerimientos">DURACIONREQUERIMIENTOS</label>
                     <p class="form-control-static">{{$historico_resuman->duracionrequerimientos}}</p>
                </div>
                    <div class="form-group">
                     <label for="duraciondiseno">DURACIONDISENO</label>
                     <p class="form-control-static">{{$historico_resuman->duraciondiseno}}</p>
                </div>
                    <div class="form-group">
                     <label for="duraciondesarrollo">DURACIONDESARROLLO</label>
                     <p class="form-control-static">{{$historico_resuman->duraciondesarrollo}}</p>
                </div>
                    <div class="form-group">
                     <label for="duracionpruebas">DURACIONPRUEBAS</label>
                     <p class="form-control-static">{{$historico_resuman->duracionpruebas}}</p>
                </div>
                    <div class="form-group">
                     <label for="duracionimplementacion">DURACIONIMPLEMENTACION</label>
                     <p class="form-control-static">{{$historico_resuman->duracionimplementacion}}</p>
                </div>
                    <div class="form-group">
                     <label for="duracionmantenimiento">DURACIONMANTENIMIENTO</label>
                     <p class="form-control-static">{{$historico_resuman->duracionmantenimiento}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('historico_resumens.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection