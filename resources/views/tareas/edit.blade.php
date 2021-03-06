@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Tareas / Edit #{{$tarea->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('enunciado')) has-error @endif">
                       <label for="enunciado-field">Enunciado</label>
                    <input type="text" id="enunciado-field" name="enunciado" class="form-control" value="{{ $tarea->enunciado }}"/>
                       @if($errors->has("enunciado"))
                        <span class="help-block">{{ $errors->first("enunciado") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('tareas.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection