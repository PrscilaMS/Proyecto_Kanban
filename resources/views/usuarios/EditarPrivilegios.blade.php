@extends('layout')

@section('header')
                 
@endsection

@section('content')
    @include('error')

        <div class="row">
            <div class="columnaPrincipal col-md-6" >
                <div class="row">
                    <div class="col-md-12">
                         <div class="page-header"><h2><i class="glyphicon glyphicon-plus"></i>Agregar Privilegios</h2></div>
                          @include('flash::message')
                            @if($equiposNoPrivilegios->count())
                                <table class="table table-condensed table-striped">
                                    <thead >
                                        <tr>
                                            <th class="rowPrincipal">Nombre</th>
                                        </tr>
                                    </thead>
                
                                    <tbody >
                                        @foreach($equiposNoPrivilegios as $equipo)
                                            @if($equipo->ID_EQUIPO == null)
                                            <tr class="row1">
                                                <td>{{$equipo->NOMBRE_EQUIPO}}</td>
                                                <td class="text-right">
                                                    <form action="{{ URL::to('/') }}/Agregar_Privilegios/{{$equipo->NOMBRE_EQUIPO}}" method="POST" style="display: inline;">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        
                                                        <button type="submit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $equiposNoPrivilegios->render() !!}
                            @else
                                <h3 class="text-center alert alert-info">No hay equipos!</h3>
                            @endif
                    </div>
                </div>
             </div>
             <vr >
             <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                       <div class="page-header"><h2><i class="glyphicon glyphicon-trash"></i>Eliminar Privilegios</h2></div> 
                        @include('flash::message')
                            @if($equiposPrivilegios->count())
                                <table class="table table-condensed table-striped">
                                    <thead >
                                        <tr>
                                            <th class="rowPrincipal">Nombre</th>
                                        </tr>
                                    </thead>
                
                                    <tbody >
                                        @foreach($equiposPrivilegios as $equipo)
                                            <tr class="row1">
                                                <td>{{$equipo->NOMBRE_EQUIPO}}</td>
                                                <td class="text-right">
                                                    
                                                    <form action="{{ URL::to('/') }}/Eliminar_Privilegios/{{$equipo->ID_EQUIPO}}" method="POST" style="display: inline;">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        
                                                        <button type="submit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                                                    </form>
                                                </td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $equiposPrivilegios->render() !!}
                            @else
                                <h3 class="text-center alert alert-info">No hay equipos!</h3>
                            @endif
                    </div>
                </div>
             </div>
             
        </div>
    
    
@endsection

