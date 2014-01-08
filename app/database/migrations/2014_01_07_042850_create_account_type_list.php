<?php

use Illuminate\Database\Migrations\Migration;

class CreateAccountTypeList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('accounttypes')->insert(
			array(
				array( 
						'name' => 'admin',
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')
					),
				array( 
						'name' => 'agent',
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')
					)
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
		DB::table('accounttypes')->delete();
	}

}