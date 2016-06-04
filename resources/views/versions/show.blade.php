@extends('layout')
@section('header')
<div class="page-header">
        <h1>Versions / Show #{{$version->id}}</h1>
        <form action="{{ route('versions.destroy', $version->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('versions.edit', $version->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="numero">NUMERO</label>
                     <p class="form-control-static">{{$version->numero}}</p>
                </div>
                    <div class="form-group">
                     <label for="esfuerzohoras">ESFUERZOHORAS</label>
                     <p class="form-control-static">{{$version->esfuerzohoras}}</p>
                </div>
                    <div class="form-group">
                     <label for="esfuerzotalla">ESFUERZOTALLA</label>
                     <p class="form-control-static">{{$version->esfuerzotalla}}</p>
                </div>
                    <div class="form-group">
                     <label for="duracion">DURACION</label>
                     <p class="form-control-static">{{$version->duracion}}</p>
                </div>
                    <div class="form-group">
                     <label for="fechafinal">FECHAFINAL</label>
                     <p class="form-control-static">{{$version->fechafinal}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('versions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection