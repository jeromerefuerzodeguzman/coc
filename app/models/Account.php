<?php

class Account extends Eloquent {

	protected $fillable = array(
				'user_id',
				'accounttype_id',
				'fname',
				'lname',
				'email'
			);

	public static function is_admin($id) {
		$user = Account::where('user_id', '=', $id)->first()->toArray();
		$is_admin = Accounttype::find($user['accounttype_id'])->toArray();
		return ($is_admin['name'] == 'admin' ? true : false);
	}


	public function user() {
		return $this->belongsTo('User');
	}


}