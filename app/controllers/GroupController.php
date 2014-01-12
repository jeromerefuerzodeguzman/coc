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
		$actions_list[0] = '';
		$actions = Action::lists('description', 'id');
		$actions_list += $actions;

		return View::make('groups.offenses')
			->with('group', $group)
			->with('offenses', $group->offenses)
			->with('actions', $actions_list);
	}


	/**
	 * Add group offense.
	 *
	 */
	public function add_offense($id) {
		$group = Group::find($id);

		$offense = $group->try_create(Input::only('description', 'section'), Input::only('1st', '2nd', '3rd', '4th', '5th'));

		return $offense;
	}


	/**
	 * Modify group.
	 *
	 */
	public function edit($id) {
		$group = Group::find($id);

		$update = $group->modify(Input::only('description'));

		return $update;
	}
}