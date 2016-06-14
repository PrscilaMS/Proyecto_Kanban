@extends('layout') @section('header')
<div class="page-header">
    <h1><i class="glyphicon glyphicon-plus"></i> Crear una Tarea para el Proyecto </h1>
</div>
@endsection @section('content') @include('error')

<div class="row">
    <div class="col-md-12">

        <form action="{{ route('tareas.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group @if($errors->has('enunciado')) has-error @endif">
                <label for="enunciado-field">Enunciado</label>
                <input type="text" id="enunciado-field" name="enunciado" class="form-control" value="{{ old(" enunciado ") }}"/> @if($errors->has("enunciado"))
                <span class="help-block">{{ $errors->first("enunciado") }}</span> @endif
            </div>
            <div class="form-group">
                <label for="dselectTallas">Talla : </label>
                <select name="talla">
                    @foreach($tallas as $talla)

                    <option class="form-control" value="{{$talla->ID_TALLA}}">{{$talla->NOMBRE_TALLA}}</option>
                    @endforeach
                </select>
            </div>
            <div class="well well-sm">
                <a class="btn " href="{{ route('proyectos.index') }}"><i class=" glyphicon "></i> Terminar y Guargar Proyecto </a>
                <button type="submit" class="btn btn-primary">Crear Tarea</button>
                
            </div>
        </form>


    </div>
</div>
@endsection