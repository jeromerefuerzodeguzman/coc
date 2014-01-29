<?php

class OffenseController extends BaseController {
 	

	/**
	 * List all offenses.
	 *
	 */
	public function index() {
		$offenses = Offense::all();

		return View::make('offenses.index')
			->with('offenses', $offenses);
	}


	/**
	 * Return offense info and actions
	 *
	 */
	public function getinfo($id) {
		$offense = Offense::find($id);

		return $offense->actions;
		#Response::json(array('name' => 'Steve', 'state' => 'CA'));
	}


	/**
	 * Update offense
	 *
	 */
	public function update_actions() {
		//var_dump(Input::all());
		$id = Input::get('eid');

		$offense = Offense::try_update($id, Input::only('e1', 'e2', 'e3', 'e4', 'e5'));

		return Redirect::to('group/'.$offense->group_id.'/offense');

		#Response::json(array('name' => 'Steve', 'state' => 'CA'));
	}
}