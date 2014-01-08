<?php

use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function($table){
			$table->increments('id');
			$table->string('description');
			$table->timestamps();
		});

		DB::table('groups')->insert(
			array(
				array('description' => 'OFFENSES AGAINST A PERSON', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
				array('description' => 'OFFENSES AGAINST PROPERTY', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
				array('description' => 'OFFENSES AGAINST COMPANY INTEREST AND POLICY', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
				array('description' => 'OFFENSES AGAINST PROPERTY', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
				array('description' => 'OFFENSES AGAINST SECURITY AND PUBLIC ORDER', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
				array('description' => 'OFFENSES AGAINST DECENCY, GOOD CUSTOMS OR ETHICS', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
				array('description' => 'OFFENSES AGAINST ADMINISTRATION POLICIES', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
				array('description' => 'OFFENSES AGAINST OPERATIONS STANDARDS', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'))
			)
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('groups');
	}

}