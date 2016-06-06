<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetareaHistoricosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tarea_historicos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('duracionRequerimientos');
            $table->integer('duracionDiseno');
            $table->integer('duracionDesarrollo');
            $table->integer('duracionPruebas');
            $table->integer('duracionImplementacion');
            $table->integer('duracionMantenimiento');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tarea_historicos');
	}

}
