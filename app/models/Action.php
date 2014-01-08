<?php

class Action extends Eloquent {

	protected $fillable = array('description');

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
}