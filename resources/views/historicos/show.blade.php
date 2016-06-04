@extends('layout')
@section('header')
<div class="page-header">
        <h1>Historicos / Show #{{$historico->id}}</h1>
        <form action="{{ route('historicos.destroy', $historico->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('historicos.edit', $historico->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$historico->nombre}}</p>
                </div>
                    <div class="form-group">
                     <label for="fechainicio">FECHAINICIO</label>
                     <p class="form-control-static">{{$historico->fechainicio}}</p>
                </div>
                    <div class="form-group">
                     <label for="fechafinal">FECHAFINAL</label>
                     <p class="form-control-static">{{$historico->fechafinal}}</p>
                </div>
                    <div class="form-group">
                     <label for="duraciontotal">DURACIONTOTAL</label>
                     <p class="form-control-static">{{$historico->duraciontotal}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('historicos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection