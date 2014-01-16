<?php

class UserController extends BaseController {

	/**
	 * Login view
	 *
	 */
	public function login() {
		return View::make('users.login');
	}

	/**
	 * Logout
	 *
	 */
	public function logout() {
		Auth::logout();

		return Redirect::to('login');
	}


	/**
	 * Authentication
	 *
	 */
	public function authenticate() {
		$validation = User::validate_login(Input::all());

		if($validation->fails()) {
			$failed = $validation->failed();
			return  Redirect::to('login')->with('error_index', $failed)->withErrors($validation)->withInput();
		} else {
			$credentials = array(
			  'username' => Input::get('username'),
			  'password' => Input::get('password')
			);

			if (Auth::attempt($credentials)) {
				if(Account::is_admin(Auth::user()->id)) {
			   		//Redirect to ADMIN PAGE
			   	} else {
			   		//Redirect to NON-ADMIN PAGE
			   		return Redirect::to('dashboard');
			   	}
			} else {
				return Redirect::to('login')
		            ->with('flash_error', 'Your username/password was incorrect.')
		            ->withInput();	
			}

		}

	}


	/**
	 * View the list of USERS
	 *
	 */
	
	public function manage_users() {

		$list = Account::where('accounts.accounttype_id', '=', '2')
					->orderBy('updated_at','DESC')
					->get();

		return View::make('users.manage_users')
					->with('accounts', $list);
					
	}

	/**
	 * Displays the registration form
	 *
	 */

	public function registration() {
		$list[0] = '';
		$account_types = Accounttype::lists('name', 'id');
		$list += $account_types;

		return View::make('users.registration_form')
				->with('type', $list);
	}


	/**
	 * Validates and add new users/account
	 *
	 */
	public function add_user() {
		$validation = User::validate_new_user(Input::all());

		if($validation->fails()) {
			$failed = $validation->failed();
			return  Redirect::to('registration')->with('error_index', $failed)->withErrors($validation)->withInput();
		}

		//If validation pass
		$user = User::create(array(
				'username' => Input::get('new_username'),
				'password' => Hash::make(Input::get('new_password')),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			));

		Account::create(array(
				'user_id' => $user->id,
				'fname' => Input::get('fname'),
				'lname' => Input::get('lname'),
				'type_id' => Input::get('accounttype_id'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			));

			return Redirect::to('dashboard')
				->with('message', 'Succesfully created');

	}


}	