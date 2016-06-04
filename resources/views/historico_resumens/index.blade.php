@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> HistoricoResumens
            <a class="btn btn-success pull-right" href="{{ route('historico_resumens.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($historico_resumens->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                        @foreach($historico_resumens as $historico_resuman)
                            <tr>
                                <td>{{$historico_resuman->id}}</td>
                                <td>{{$historico_resuman->duracionrequerimientos}}</td>
                    <td>{{$historico_resuman->duraciondiseno}}</td>
                    <td>{{$historico_resuman->duraciondesarrollo}}</td>
                    <td>{{$historico_resuman->duracionpruebas}}</td>
                    <td>{{$historico_resuman->duracionimplementacion}}</td>
                    <td>{{$historico_resuman->duracionmantenimiento}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('historico_resumens.show', $historico_resuman->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('historico_resumens.edit', $historico_resuman->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('historico_resumens.destroy', $historico_resuman->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $historico_resumens->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection