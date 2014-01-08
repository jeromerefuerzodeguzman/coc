<?php

use Illuminate\Database\Migrations\Migration;

class CreateOffenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offenses', function($table){
			$table->increments('id');
			$table->integer('group_id');	
			$table->string('section', 10);
			$table->string('description');
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
		Schema::drop('offenses');
	}

}