@extends('layout') @section('header')
<div class="page-header clearfix">
     
        <h1>
            <i class="glyphicon glyphicon-list-alt"></i> Historicos
        </h1>
        <a class="crear btn pull-right" href="{{ route('historicos.create') }}"><h5><i class=" glyphicon glyphicon-plus"></i> Crear Histórico</h5></a>
   
</div>
@endsection @section('content')
<div class="row">
    @include('flash::message')
    <div class="col-md-12">
        
        <form role="search" class="navbar-form navbar-right">
                <div class="form-group">
                    <label for="nombre-field">Buscar por nombre: </label>
                    <input type="text" placeholder="Escriba el nombre" class="form-control">
                </div>
        </form>
        @if($historicos->count())
        <table class="table table-condensed table-striped">
            <thead >
                <tr >
                    <th class="rowPrincipal" >Nombre</th>
                    <th class="rowPrincipal" >Equipo</th>
                    <th class="rowPrincipal" >Fecha Inicio</th>
                    <th class="rowPrincipal" >Fecha Final</th>
                    <th class="rowPrincipal" >Duración Total</th>
                </tr>
            </thead>

            <tbody>
                @foreach($datos as $historico)
                <tr class="row1">
                    <td >{{$historico->NOMBRE_HISTORICO}}</td>
                    <td >{{$historico->NOMBRE_EQUIPO}}</td>
                    <td>{{$historico->FECHA_INICIO}}</td>
                    <td>{{$historico->FECHA_FINAL}}</td>
                    <td>{{$historico->ESFUERZO}}</td>
                    <td class="text-left">
                        <a class="btn btn-xs btn-primary" href="{{ route('historicos.show', $historico->ID_HISTORICO) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                        <form action="{{ route('historicos.destroy', $historico->ID_HISTORICO) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Seguro que quiere eliminar el histórico?')) { return true } else {return false };">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $historicos->render() !!} @else
        <h3 class="text-center alert alert-info">No existen históricos!</h3> @endif

    </div>
</div>

@endsection