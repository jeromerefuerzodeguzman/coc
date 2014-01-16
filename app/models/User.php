<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


	protected $fillable = array(
				'username',
				'password',
				);

	public static function validate_login($data) {
		$rules = array(
			'username' => 'required',
			'password' => 'required'
		);

		return Validator::make($data,$rules);
	}
	
	public function account() {
			return $this->hasOne('Account');
	}


	public static function validate_new_user($data) {

		$rules = array(
			'new_username' => 'unique:users,username|required|min:2',
			'new_password' => 'required|min:2|confirmed',
			'new_password_confirmation' => 'required|min:2',
			'fname' => 'required|min:2',
			'lname' => 'required|min:2',
			'accounttype_id' => 'required'
		);
		return Validator::make($data,$rules);
	}

}