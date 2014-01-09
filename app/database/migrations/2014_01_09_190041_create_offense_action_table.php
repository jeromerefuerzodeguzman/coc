<?php

use Illuminate\Database\Migrations\Migration;

class CreateOffenseActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('action_offense', function($table){
			$table->increments('id');
			$table->integer('offense_id');
			$table->integer('action_id');
			$table->integer('order');
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
		Schema::drop('action_offense');
	}

}