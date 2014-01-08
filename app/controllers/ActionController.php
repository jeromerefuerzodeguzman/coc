<?php

class ActionController extends BaseController {

	/**
	 * List all actions.
	 *
	 */
	public function index() {
		$actions = Action::all();

		return View::make('actions.index')
			->with('actions', $actions);
	}


	/**
	 * Add action.
	 *
	 */
	public function add() {
		$action = Action::try_create(Input::only('description'));

		return $action;
	}
}