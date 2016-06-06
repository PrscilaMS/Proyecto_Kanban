@extends('layout') @section('header')
<div class="page-header clearfix">
     @include('flash::message')
    <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Historicos
            <a class="btn btn-success pull-right" href="{{ route('historicos.create') }}"><i class="glyphicon glyphicon-plus"></i> Crear</a>
        </h1>

</div>
@endsection @section('content')
<div class="row">
    <div class="col-md-12">
        @if($historicos->count())
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA FINAL</th>
                    <th>DURACION TOTAL</th>
                    <th class="text-right">OPCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach($historicos as $historico)
                <tr>
                    <td>{{$historico->NOMBRE_HISTORICO}}</td>
                    <td>{{$historico->FECHA_INICIO}}</td>
                    <td>{{$historico->FECHA_FINAL}}</td>
                    <td>{{$historico->DURACION_TOTAL}}</td>
                    <td class="text-right">
                        <a class="btn btn-xs btn-primary" href="{{ route('historicos.show', $historico->ID_HISTORICO) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                        <a class="btn btn-xs btn-warning" href="{{ route('historicos.edit', $historico->ID_HISTORICO) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        <form action="{{ route('historicos.destroy', $historico->ID_HISTORICO) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i>Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $historicos->render() !!} @else
        <h3 class="text-center alert alert-info">No existen usuarios!</h3> @endif

    </div>
</div>

@endsection