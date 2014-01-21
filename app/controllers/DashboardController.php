<?php

class DashboardController extends BaseController {
 	
	/**
	 * List of offense group in list format
	 *
	 */
	public function dashboard() {
		$groups = Group::all();
		$count = $groups->count();

		return View::make('dashboard.dashboard')
				->with('groups', $groups)
				->with('count', $count);

	}

	/**
	 * Viewing of the sections of each group
	 *
	 */
	public function dashboard_viewgroup($id) {
		$group = Group::find($id);

		return View::make('dashboard.dashboard_offenses')
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

		return View::make('dashboard.search')
			->with('offenses', $list);
		
	}
}