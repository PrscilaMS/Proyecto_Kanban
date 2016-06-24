@extends('layout') @section('header') @endsection @section('content')
<div class="row">
    <div id="titulo">
        <h1>Menú de Inicio</h1>
        <h3>Elija una opción</h3>
    </div>
    <div class="col-md-6 opcion">
        <div class="intro-table intro-table-hover table-historicos">
            <h3 class="white heading hide-hover">Historicos</h5>
                <div class="bottom">
                    <h4 class="white heading small-heading no-margin regular historicos">Aquí podras consultar los historicos disponibles</h4>
                    <a href="/historicos" class="btn btn-white-fill expand">Ingresar</a>
                </div>
            </div>
    </div>
   <div class="col-md-6 opcion">
        <div class="intro-table intro-table-hover table-proyectos">
            <h3 class="white heading hide-hover">Proyectos</h5>
                <div class="bottom">
                    <h4 class="white heading small-heading no-margin regular proyectos">Aquí podras consultar versiones de proyectos y realizar estimaciones</h4>
                    <a href="/proyectos" class="btn btn-white-fill expand">Ingresar</a>
                </div>
            </div>
    </div>
</div>

@endsection