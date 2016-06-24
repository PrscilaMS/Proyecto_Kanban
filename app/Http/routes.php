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

Route::get("privilegios", array("as"=>"dashboard","uses"=>"UsuarioController@indexPrivilegios"));

Route::get("usuarios_equipos", array("as"=>"dashboard","uses"=>"UsuarioController@mostrarEquiposRelacionados"));

Route::post("buscarPorNombreApellido", array("as"=>"dashboard","uses"=>"UsuarioController@buscarPorNombreApellido"));

Route::post("Agregar_Privilegios/{nombre}", array("as"=>"dashboard","uses"=>"UsuarioController@agregarPrivilegios"));

Route::post("Eliminar_Privilegios/{id}", array("as"=>"dashboard","uses"=>"UsuarioController@eliminarPrivilegios"));


Route::resource("proyectos","ProyectoController");

Route::resource("tareas","TareaController");

Route::resource("tallas","TallaController");

Route::resource("historicos","HistoricoController");

Route::resource("tarea_historicos","TareaHistoricoController");

Route::resource("equipos","EquipoController");

Route::resource("versions","VersionController");

Route::resource("historico_resumens","HistoricoResumanController");

Route::patch('historicos/CreateHistorico',[
    'as' => 'historicos/CreateHistorico',
    'uses' => 'HistoricoController@updateCreateHistorico'
]);

 Route::get('mostrar-version/{id}', ['as' => 'mostrarVersiones', 'uses' => 'VersionController@mostrarVersiones']);
 
 Route::get('eliminar-version/{id}/{id2}', ['as' => 'eliminarVersiones', 'uses' => 'VersionController@eliminarVersiones']);

 Route::get("estimacionProyecto", array("as"=>"dashboard","uses"=>"ProyectoController@estimacionProyecto"));
 