<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource("usuarios","UsuarioController");

Route::resource("proyectos","ProyectoController");

Route::resource("tareas","TareaController");

Route::resource("tallas","TallaController");

Route::resource("historicos","HistoricoController");

Route::resource("tarea_historicos","TareaHistoricoController");

Route::resource("equipos","EquipoController");

Route::resource("versions","VersionController");

Route::resource("historico_resumens","HistoricoResumanController");