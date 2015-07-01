<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seances', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('id');
			$table->date('created_at');
			$table->date('updated_at');
			$table->integer('id_patient');
			$table->date('date');
			$table->string('titre');
			$table->text('commentaire');
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
		Schema::drop('seances');
	}

}
