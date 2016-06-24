@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Proyectos
            <a class="crear btn pull-right" href="{{ route('proyectos.create') }}"><h5><i class="glyphicon glyphicon-plus"></i> Crear Proyecto</h5></a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($proyectos->count())
                <table class="tabla table table-condensed table-striped center">
                    <thead>
                        <tr class="col-md-6">
                            <th class="rowPrincipal col-md-8">Nombre</th>
                            <th class="rowPrincipal col-md-8">Fecha Inicio</th>
                        </tr>
                    </thead>

                    <tbody class="col-md-6">
                        @foreach($proyectos as $proyecto)
                            <tr class="row1">
                                <td class="col-md-4">{{$proyecto->NOMBRE_PROYECT}}</td>
                                <td class="col-md-4">{{$proyecto->FECHA_INICIO}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route ('mostrarVersiones',[$proyecto->ID_PROYECTO])}}"><i class="glyphicon glyphicon-eye-open"></i> Mostrar Versiones del Proyecto</a>
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