<?php

class Action extends Eloquent {

	protected $fillable = array('description');


	/**
	 * Create new action.
	 *
	 */
	public static function try_create($info) {
			
		$validator = Validator::make(
		    $info,
		    array(
		        'description' => 'required'
		    )
		);

		if ($validator->fails()) {
			return Redirect::to('actions')
				->withErrors($validator);
		}
		
		//somehow validation successful
		$action = Action::create($info);

		return Redirect::to('actions');
	}


	/**
	 * Create array of action for dropdown list.
	 *
	 */
	public function dropdown() {
		$actions = static::all();

		foreach ($actions as $ction) {
			# code...
		}
	}
}