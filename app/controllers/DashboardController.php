<?php

class DashboardController extends BaseController {
 	
	/**
	 * Viewing of the sections of each group
	 *
	 */
	public function dashboard($id) {
		$groups = Group::all();
		$group = Group::find($id);

		return View::make('dashboard.offenses')
			->with('groups', $groups)
			->with('group', $group)
			->with('offenses', $group->offenses);
		
	}

	/**
	 * Search for Section
	 *
	 */
	public function search() {
		$list = Offense::where('description', 'LIKE', '%' . Input::get('description') . '%')
						->orderBy('group_id', 'asc')
						->orderBy('section', 'asc')
						->get();

		$groups = Group::all();

		return View::make('dashboard.search')
			->with('groups', $groups)
			->with('offenses', $list);
		
	}
}