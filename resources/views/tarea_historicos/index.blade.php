@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> TareaHistoricos
            <a class="btn btn-success pull-right" href="{{ route('tarea_historicos.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
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
                            <th>ID</th>
                            <th>NOMBRE</th>
                        <th>DURACIONREQUERIMIENTOS</th>
                        <th>DURACIONDISENO</th>
                        <th>DURACIONDESARROLLO</th>
                        <th>DURACIONPRUEBAS</th>
                        <th>DURACIONIMPLEMENTACION</th>
                        <th>DURACIONMANTENIMIENTO</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tarea_historicos as $tarea_historico)
                            <tr>
                                <td>{{$tarea_historico->id}}</td>
                                <td>{{$tarea_historico->nombre}}</td>
                    <td>{{$tarea_historico->duracionrequerimientos}}</td>
                    <td>{{$tarea_historico->duraciondiseno}}</td>
                    <td>{{$tarea_historico->duraciondesarrollo}}</td>
                    <td>{{$tarea_historico->duracionpruebas}}</td>
                    <td>{{$tarea_historico->duracionimplementacion}}</td>
                    <td>{{$tarea_historico->duracionmantenimiento}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('tarea_historicos.show', $tarea_historico->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('tarea_historicos.edit', $tarea_historico->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('tarea_historicos.destroy', $tarea_historico->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
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