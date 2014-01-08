<?php

use Illuminate\Database\Migrations\Migration;

class CreateDefaultUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$user_admin = User::create(array(
				'username' => 'admin',
				'password' => Hash::make('admin'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			));

		Account::create(array(
				'user_id' => $user_admin->id,
				'accounttype_id' => '1',
				'fname' => 'Super',
				'lname' => 'Admin',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			));

		$user_agent = User::create(array(
				'username' => 'test',
				'password' => Hash::make('test'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			));

		Account::create(array(
				'user_id' => $user_agent->id,
				'accounttype_id' => '2',
				'fname' => 'Test',
				'lname' => 'Agent',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('users')->delete();
		DB::table('accounts')->delete();
	}

}