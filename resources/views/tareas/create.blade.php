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
        </form></br>
        
        <h2>Tareas ingresadas</h2>
        
        
        
        @if($tareas != null)
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID TAREA</th>
                            <th>ENUNCIADO</th>
                            <th>Talla</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tareas as $tarea)
                            <tr>
                                <td>{{$tarea->ID_TAREA}}</td>
                                <td>{{$tarea->ENUNCIADO}}</td>
                                <td>{{$tarea->ID_TALLA}}</td>                                
                                <td class="text-right">
                                    <form action="{{ route('tareas.destroy', $tarea->ID_TAREA) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            @else
                <h3 class="text-center alert alert-info">No hay registros!</h3>
            @endif

    </div>
</div>
@endsection