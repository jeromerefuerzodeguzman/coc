<?php

	class Group extends Eloquent {

		/**
		 * Relationships
		 *
		 */
		public function offenses() {
			return $this->hasMany('Offense')->orderBy('section');
		}


		public function try_create($info) {
			
			$validator = Validator::make(
			    $info,
			    array(
			        'section' => 'required|unique:offenses',
			        'description' => 'required'
			    )
			);

			if ($validator->fails()) {
				return Redirect::to('group/'.$this->id.'/offense')
					->withErrors($validator);
			}
			
			//somehow validation successful
			$offense = new Offense($info);
			$offense = $this->offenses()->save($offense);

			return Redirect::to('group/'.$this->id.'/offense');
		}
	}
?>