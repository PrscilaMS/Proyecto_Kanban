@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Tallas
            <a class="btn pull-right" href="{{ route('tallas.create') }}"><h5><i class="glyphicon glyphicon-plus"></i> Crear Talla</h5></a>

        </h1>
        
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
             @include('flash::message')
            @if($tallas->count())
                <table class="tablaTalla table table-condensed table-striped center">
                    <thead>
                        <tr class="col-md-8">
                            <th class="rowPrincipal col-md-2">Sigla</th>
                        </tr>
                    </thead>

                    <tbody class="col-md-8">
                        @foreach($tallas as $talla)
                            <tr class="row1">
                                <td class="col-md-8">{{$talla->NOMBRE_TALLA}}</td>
                                <td class="text-right">
                                    
                                    <a class="btn btn-xs btn-primary" href="{{ route('tallas.edit', $talla->ID_TALLA) }}"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                                    <form action="{{ route('tallas.destroy', $talla->ID_TALLA) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Esta seguro que desea eliminar la talla?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
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