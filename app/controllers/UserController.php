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
	 * List of offense group in list format
	 *
	 */
	public function dashboard() {
		$groups = Group::all();
		$count = $groups->count();

		return View::make('users.dashboard')
				->with('groups', $groups)
				->with('count', $count);

	}

	/**
	 * Viewing of the sections of each group
	 *
	 */
	public function dashboard_viewgroup($id) {
		$group = Group::find($id);

		return View::make('users.dashboard_offenses')
			->with('group', $group)
			->with('offenses', $group->offenses);
		
	}


}	