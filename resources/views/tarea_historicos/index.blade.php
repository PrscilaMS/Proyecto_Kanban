@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Tarea de Histórico
            <a class="btn btn-success pull-right" href="{{ route('tarea_historicos.create') }}"><i class="glyphicon glyphicon-plus"></i> Agregar tarea</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($tarea_historicos->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                        <th>REQUERIMIENTOS</th>
                        <th>DISEÑO</th>
                        <th>DESARROLLO</th>
                        <th>PRUEBAS</th>
                        <th>IMPLEMENTACION</th>
                        <th>MANTENIMIENTO</th>
                            <th class="text-right">OPCIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tarea_historicos as $tarea_historico)
                            <tr>
                                <td>{{$tarea_historico->NOMBRE_TAREA_HISTRICO}}</td>
                    <td>{{$tarea_historico->DURACION_REQUERIMIENTOS}}</td>
                    <td>{{$tarea_historico->DURACION_DISENO}}</td>
                    <td>{{$tarea_historico->DURACION_DESARROLLO}}</td>
                    <td>{{$tarea_historico->DURACION_PRUEBAS}}</td>
                    <td>{{$tarea_historico->DURACION_IMPLEMENTACION}}</td>
                    <td>{{$tarea_historico->DURACION_MANTENIMIENTO}}</td>
                    
        
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('tarea_historicos.show', $tarea_historico->ID_TAREA_HISTORICO) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('tarea_historicos.edit', $tarea_historico->ID_TAREA_HISTORICO) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
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
                {!! $tarea_historicos->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection