@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> HistoricoResumens / Edit #{{$historico_resuman->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('historico_resumens.update', $historico_resuman->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('duracionrequerimientos')) has-error @endif">
                       <label for="duracionrequerimientos-field">DuracionRequerimientos</label>
                    <input type="text" id="duracionrequerimientos-field" name="duracionrequerimientos" class="form-control" value="{{ $historico_resuman->duracionrequerimientos }}"/>
                       @if($errors->has("duracionrequerimientos"))
                        <span class="help-block">{{ $errors->first("duracionrequerimientos") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duraciondiseno')) has-error @endif">
                       <label for="duraciondiseno-field">DuracionDiseno</label>
                    <input type="text" id="duraciondiseno-field" name="duraciondiseno" class="form-control" value="{{ $historico_resuman->duraciondiseno }}"/>
                       @if($errors->has("duraciondiseno"))
                        <span class="help-block">{{ $errors->first("duraciondiseno") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duraciondesarrollo')) has-error @endif">
                       <label for="duraciondesarrollo-field">DuracionDesarrollo</label>
                    <input type="text" id="duraciondesarrollo-field" name="duraciondesarrollo" class="form-control" value="{{ $historico_resuman->duraciondesarrollo }}"/>
                       @if($errors->has("duraciondesarrollo"))
                        <span class="help-block">{{ $errors->first("duraciondesarrollo") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duracionpruebas')) has-error @endif">
                       <label for="duracionpruebas-field">DuracionPruebas</label>
                    <input type="text" id="duracionpruebas-field" name="duracionpruebas" class="form-control" value="{{ $historico_resuman->duracionpruebas }}"/>
                       @if($errors->has("duracionpruebas"))
                        <span class="help-block">{{ $errors->first("duracionpruebas") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duracionimplementacion')) has-error @endif">
                       <label for="duracionimplementacion-field">DuracionImplementacion</label>
                    <input type="text" id="duracionimplementacion-field" name="duracionimplementacion" class="form-control" value="{{ $historico_resuman->duracionimplementacion }}"/>
                       @if($errors->has("duracionimplementacion"))
                        <span class="help-block">{{ $errors->first("duracionimplementacion") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('duracionmantenimiento')) has-error @endif">
                       <label for="duracionmantenimiento-field">DuracionMantenimiento</label>
                    <input type="text" id="duracionmantenimiento-field" name="duracionmantenimiento" class="form-control" value="{{ $historico_resuman->duracionmantenimiento }}"/>
                       @if($errors->has("duracionmantenimiento"))
                        <span class="help-block">{{ $errors->first("duracionmantenimiento") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('historico_resumens.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection