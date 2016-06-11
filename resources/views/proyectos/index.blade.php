@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Proyectos
            <a class="btn pull-right" href="{{ route('proyectos.create') }}"><h4><i class="glyphicon glyphicon-plus"></i> Crear Proyecto</h4></a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($proyectos->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th class="rowPrincipal">NOMBRE</th>
                        <th class="rowPrincipal">FECHA INICIO</th>
                            <th class="rowPrincipal">OPTIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($proyectos as $proyecto)
                            <tr class="row1">
                                <td>{{$proyecto->NOMBRE_PROYECT}}</td>
                    <td>{{$proyecto->FECHA_INICIO}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('proyectos.show', $proyecto->ID_PROYECTO) }}"><i class="glyphicon glyphicon-eye-open"></i> Mostrar </a>
                                    <a class="btn btn-xs btn-primary" href="{{ route('proyectos.edit', $proyecto->ID_PROYECTO) }}"><i class="glyphicon glyphicon-edit"></i> Modificar</a>
                                    <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $proyectos->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection