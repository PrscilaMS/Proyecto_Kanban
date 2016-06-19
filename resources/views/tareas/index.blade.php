@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Tareas
            <a class="btn btn-success pull-right" href="{{ route('tareas.create') }}"><i class="glyphicon glyphicon-plus"></i> Crear</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($tareas->count())
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
                                    <a class="btn btn-xs btn-primary" href="{{ route('tareas.show', $tarea->ID_TAREA) }}"><i class="glyphicon glyphicon-eye-open"></i> Mostrar</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('tareas.edit', $tarea->ID_TAREA) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                    <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $tareas->render() !!}
            @else
                <h3 class="text-center alert alert-info">No hay registros!</h3>
            @endif

        </div>
    </div>

@endsection