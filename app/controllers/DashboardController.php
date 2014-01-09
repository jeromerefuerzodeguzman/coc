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
}