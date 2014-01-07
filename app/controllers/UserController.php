<?php

class UserController extends BaseController {

	/**
	 * login view
	 * @return [type] [description]
	 */
	public function login() {
		return View::make('users.login');
	}

	/**
	 * logout
	 * @return [type] [description]
	 */
	public function logout() {
		Auth::logout();

		return Redirect::to('login');
	}

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

}	