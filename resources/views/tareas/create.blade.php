@extends('layout') @section('header')
<div class="page-header">
    <h1><i class="glyphicon glyphicon-plus"></i> Crear Tarea de Proyecto </h1>
</div>
@endsection @section('content') @include('error')

<div class="row">
    <div class="contenido-formulario  col-md-12">

        <form action="{{ route('tareas.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group @if($errors->has('enunciado')) has-error @endif">
                <label class="enunciado" for="enunciado-field">Enunciado</label>
                <input type="text" id="enunciado-field" name="enunciado" class="enunciado form-control" value="{{ old(" enunciado ") }}"/> @if($errors->has("enunciado"))
                <span class="help-block">{{ $errors->first("enunciado") }}</span> @endif
            </div>
            
            <div class="form-group">
                <label class="selectContainer" for="selectContainer">Talla </label>
                <div class="selectContainer">
                    <select name="talla" class="form-control">
                       @foreach($tallas as $talla)
                           <option class="form-control"  value="{{$talla->ID_TALLA}}">{{$talla->NOMBRE_TALLA}}</option>
                      @endforeach
                    </select>
            </div>
            </div>
            
            <div class="well well-sm">
                <a class="btn " href="{{URL::to('/') }}/estimacionProyecto"><i class=" glyphicon "></i> Terminar  </a>
                <button type="submit" class="btn btn-primary">Crear Tarea</button>
                
            </div>
        </form></br>
        
        <h2 class="page-header">Tareas ingresadas</h2>
        
        <div class="row">
            <div class="col-md-12">
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
                    <h3 class="text-center alert alert-info">No hay tareas!</h3>
                @endif
            </div>
        </div>    

    </div>
</div>
@endsection