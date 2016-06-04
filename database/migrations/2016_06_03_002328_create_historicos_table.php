<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatehistoricosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historicos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fechaInicio');
            $table->date('fechaFinal');
            $table->integer('duracionTotal');
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
		Schema::drop('historicos');
	}

}
