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
}