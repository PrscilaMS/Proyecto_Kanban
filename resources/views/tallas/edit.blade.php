@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Talla #{{$talla->ID_TALLA}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('tallas.update', $talla->ID_TALLA) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('sigla')) has-error @endif">
                       <label for="sigla-field">Sigla: </label>
                    <input type="text" id="sigla-field" name="sigla" class="form-control" value="{{ $talla->NOMBRE_TALLA }}"/>
                       @if($errors->has("sigla"))
                        <span class="help-block">{{ $errors->first("sigla") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-link pull-right" href="{{ route('tallas.index') }}"><i class="glyphicon glyphicon-backward"></i>  Volver</a>
                </div>
            </form>

        </div>
    </div>
@endsection