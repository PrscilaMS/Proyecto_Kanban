@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-user"></i> Equipos
            <a class="btn btn-success pull-right" href="{{ route('equipos.create') }}"><i class="glyphicon glyphicon-plus"></i> Crear Equipo</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
            @if($equipos->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th class="text-right">OPCIONES</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($equipos as $equipo)
                            <tr>
                                <td>{{$equipo->ID_EQUIPO}}</td>
                                <td>{{$equipo->NOMBRE_EQUIPO}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('equipos.show', $equipo->ID_EQUIPO) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('equipos.edit', $equipo->ID_EQUIPO) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                    <form action="{{ route('equipos.destroy', $equipo->ID_EQUIPO) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Seguro que desea elimnar el equipo?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $equipos->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection