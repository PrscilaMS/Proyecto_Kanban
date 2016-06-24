@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Versiones
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($versions != null)
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NUMERO</th>
                        <th>ESFUERZOHORAS</th>
                        <th>DURACION</th>
                        <th>FECHAFINAL</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($versions as $version)
                            <tr>
                                <td>{{$version->ID_VERSION}}</td>
                                <td>{{$version->NUMERO_VERSION}}</td>
                    <td>{{$version->ESFUERZO_HORAS}}</td>
                    <td>{{$version->DURACION}}</td>
                    <td>{{$version->FECHA_FINAL}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs " href="{{ route('versions.show', $version->ID_VERSION) }}"><i class="glyphicon glyphicon-eye-open"></i> Mostrar</a>
                                    <a class="btn btn-xs " href="{{ route('versions.edit', $version->ID_VERSION) }}"><i class="glyphicon glyphicon-edit"></i> Crear una nueva version</a>
                                    <form action="{{ route('versions.destroy', $version->ID_VERSION) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro de eliminar esta versión, le recordamos que todas las versiones posteriores a esta se eliminaran también.')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="idProyecto" value="{{ $idProyecto }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs "><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center alert alert-info">No hay registros!</h3>
            @endif

        </div>
    </div>

@endsection