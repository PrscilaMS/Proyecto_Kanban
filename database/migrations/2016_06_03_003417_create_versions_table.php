<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateversionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('versions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('esfuerzoHoras');
            $table->integer('esfuerzoTalla');
            $table->integer('duracion');
            $table->date('fechaFinal');
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
		Schema::drop('versions');
	}

}
