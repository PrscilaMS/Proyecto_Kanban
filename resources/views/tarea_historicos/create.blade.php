@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Crear Tarea Histórico</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form name="boton1" action="{{ route('tarea_historicos.store') }}" method="POST">
                <form name="boton2" action="{{ route('tarea_historicos.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                       <label for="nombre-field">Nombre</label>
                    <input type="text" id="tg t65" name="nombre" class="form-control" value="{{ old("nombre") }}"/>
                       @if($errors->has("nombre"))
                        <span class="help-block">{{ $errors->first("nombre") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duracionrequerimientos')) has-error @endif">
                       <label for="duracionrequerimientos-field">Duración Requerimientos</label>
                    <input type="text" id="duracionrequerimientos-field" name="duracionrequerimientos" class="form-control" value="{{ old("duracionrequerimientos") }}"/>
                       @if($errors->has("duracionrequerimientos"))
                        <span class="help-block">{{ $errors->first("duracionrequerimientos") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duraciondiseno')) has-error @endif">
                       <label for="duraciondiseno-field">Duración Diseño</label>
                    <input type="text" id="duraciondiseno-field" name="duraciondiseno" class="form-control" value="{{ old("duraciondiseno") }}"/>
                       @if($errors->has("duraciondiseno"))
                        <span class="help-block">{{ $errors->first("duraciondiseno") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duraciondesarrollo')) has-error @endif">
                       <label for="duraciondesarrollo-field">Duración Desarrollo</label>
                    <input type="text" id="duraciondesarrollo-field" name="duraciondesarrollo" class="form-control" value="{{ old("duraciondesarrollo") }}"/>
                       @if($errors->has("duraciondesarrollo"))
                        <span class="help-block">{{ $errors->first("duraciondesarrollo") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duracionpruebas')) has-error @endif">
                       <label for="duracionpruebas-field">Duración Pruebas</label>
                    <input type="text" id="duracionpruebas-field" name="duracionpruebas" class="form-control" value="{{ old("duracionpruebas") }}"/>
                       @if($errors->has("duracionpruebas"))
                        <span class="help-block">{{ $errors->first("duracionpruebas") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duracionimplementacion')) has-error @endif">
                       <label for="duracionimplementacion-field">Duración Implementacion</label>
                    <input type="text" id="duracionimplementacion-field" name="duracionimplementacion" class="form-control" value="{{ old("duracionimplementacion") }}"/>
                       @if($errors->has("duracionimplementacion"))
                        <span class="help-block">{{ $errors->first("duracionimplementacion") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duracionmantenimiento')) has-error @endif">
                       <label for="duracionmantenimiento-field">Duración Mantenimiento</label>
                    <input type="text" id="duracionmantenimiento-field" name="duracionmantenimiento" class="form-control" value="{{ old("duracionmantenimiento") }}"/>
                       @if($errors->has("duracionmantenimiento"))
                        <span class="help-block">{{ $errors->first("duracionmantenimiento") }}</span>
                       @endif
                    </div>
                    
                    <div class="form-group">
                         <label for="selectTallas">Talla</label>
                    <select name="selectTallas" >
                      @foreach($tallas as $talla)
                      
                       <option class="form-control"  value="{{$talla->ID_TALLA}}">{{$talla->NOMBRE_TALLA}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="well well-sm">
                    
               
                    
                     	<button type="submit" name="boton2"   value="historico" class="btn btn-primary" >Terminar, Guardar Histórico</button> 
                    </form>
                    <button type="submit" name="boton"  value="tarea" class="btn btn-primary">Agregar Tarea</button>
                    
                </div>
            </form>
           
        </div>
    </div>
@endsection