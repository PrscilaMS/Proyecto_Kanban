@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Crear Tarea Histórico</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="contenido-formulario col-md-12">
                <form name="boton1" action="{{ route('tarea_historicos.store') }}" method="POST">
                    <form name="boton2" action="{{ route('tarea_historicos.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                    <div class="form-group  @if($errors->has('nombre')) has-error @endif">
                        <label class="nombre" for="nombre-field">Nombre</label>
                        <input type="text" id="nombre-field" name="nombre" class="nombre form-control" value="{{ old("nombre") }}" maxlength="40" required/>
                           @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                           @endif
                    </div>
                     <div class="form-group">
                        <label class="selectContainer" for="selectContainer">Talla </label>
                        <div class="selectContainer">
                            <select name="selectTallas" class="form-control">
                               @foreach($tallas as $talla)
                                   <option class="form-control"  value="{{$talla->ID_TALLA}}">{{$talla->NOMBRE_TALLA}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <legend class="titulos-secundarios">Duración por etapas</legend>
                    <div class="duraciones1">
                        <div class="requerimientos form-group @if($errors->has('duracionrequerimientos')) has-error @endif">
                            <label for="duracionrequerimientos-field">Requerimientos: </label>
                            <input type="text" id="duracionrequerimientos-field" name="duracionrequerimientos" class="duracion form-control" value="{{ old("duracionrequerimientos") }}" maxlength="11" required/>
                               @if($errors->has("duracionrequerimientos"))
                            <span class="help-block">{{ $errors->first("duracionrequerimientos") }}</span>
                               @endif
                        </div>
                        <div class="diseño form-group @if($errors->has('duraciondiseno')) has-error @endif">
                            <label for="duraciondiseno-field">Diseño: </label>
                            <input type="text" id="duraciondiseno-field" name="duraciondiseno" class="duracion form-control" value="{{ old("duraciondiseno") }}"  maxlength="11"  required/>
                               @if($errors->has("duraciondiseno"))
                            <span class="help-block">{{ $errors->first("duraciondiseno") }}</span>
                               @endif
                        </div>
                         
                    </div>
                    <div class="duraciones2">
                       <div class="desarrollo form-group @if($errors->has('duraciondesarrollo')) has-error @endif">
                            <label for="duraciondesarrollo-field">Desarrollo: </label>
                            <input type="text" id="duraciondesarrollo-field" name="duraciondesarrollo" class="duracion form-control" value="{{ old("duraciondesarrollo") }}"  maxlength="11"  required/>
                               @if($errors->has("duraciondesarrollo"))
                            <span class="help-block">{{ $errors->first("duraciondesarrollo") }}</span>
                               @endif
                        </div>
                        <div class="pruebas form-group @if($errors->has('duracionpruebas')) has-error @endif">
                            <label for="duracionpruebas-field">Pruebas: </label>
                            <input type="text" id="duracionpruebas-field" name="duracionpruebas" class="duracion form-control" value="{{ old("duracionpruebas") }}"  maxlength="11"  required/>
                               @if($errors->has("duracionpruebas"))
                            <span class="help-block">{{ $errors->first("duracionpruebas") }}</span>
                               @endif
                        </div>
                    </div>
    
                   
                <div class="botones well well-sm">
                    <button type="submit" name="boton-terminar"   value="historico" class="btn btn-primary" >Terminar</button> 
                    </form>
                    <button type="submit" name="boton-agregartarea"  value="tarea" class="btn btn-primary">Agregar Tarea</button>
                </div>
            </form>
        </div>
    </div>
    
     <h2 class="page-header">Tareas ingresadas</h2>
        
    <div class="row">
        <div class="col-md-12">
            @if($tareas_historicos != null)
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                        <th>REQUERIMIENTOS</th>
                        <th>DISEÑO</th>
                        <th>DESARROLLO</th>
                        <th>PRUEBAS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tareas_historicos as $tarea_historico)
                            <tr>
                                <td>{{$tarea_historico->NOMBRE_TAREA_HISTRICO}}</td>
                                <td>{{$tarea_historico->DURACION_REQUERIMIENTOS}}</td>
                                <td>{{$tarea_historico->DURACION_DISENO}}</td>
                                <td>{{$tarea_historico->DURACION_DESARROLLO}}</td>
                                <td>{{$tarea_historico->DURACION_PRUEBAS}}</td>
                    
        
                                <td class="text-right">
                                    <form action="{{ route('tarea_historicos.destroy', $tarea_historico->ID_TAREA_HISTORICO) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
    
    
@endsection