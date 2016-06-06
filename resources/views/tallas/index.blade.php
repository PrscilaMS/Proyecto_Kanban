@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Tallas
            <a class="btn btn-success pull-right" href="{{ route('tallas.create') }}"><i class="glyphicon glyphicon-plus"></i> Crear Talla</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($tallas->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>SIGLA</th>
                            <th class="text-right">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tallas as $talla)
                            <tr>
                                <td>{{$talla->NOMBRE_TALLA}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('tallas.show', $talla->ID_TALLA) }}"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('tallas.edit', $talla->ID_TALLA) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                    <form action="{{ route('tallas.destroy', $talla->ID_TALLA) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $tallas->render() !!}
            @else
                <h3 class="text-center alert alert-info">No hay tallas!</h3>
            @endif

        </div>
    </div>

@endsection