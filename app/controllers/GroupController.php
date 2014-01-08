<?php

class GroupController extends BaseController {
 	

	/**
	 * List all groups.
	 *
	 */
	public function index() {
		$groups = Group::all();

		return View::make('groups.index')
			->with('groups', $groups);
	}


	/**
	 * View group detail.
	 *
	 */
	public function view($id) {
		$group = Group::find($id);

		return View::make('groups.view')
			->with('group', $group);
	}


	/**
	 * View group offenses.
	 *
	 */
	public function offenses($id) {
		$group = Group::find($id);

		return View::make('groups.offenses')
			->with('group', $group)
			->with('offenses', $group->offenses);
	}


	/**
	 * Add group offense.
	 *
	 */
	public function add_offense($id) {
		$group = Group::find($id);

		$offense = $group->try_create(Input::only('description', 'section'));

		return $offense;
	}
}