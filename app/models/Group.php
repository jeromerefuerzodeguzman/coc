<?php

	class Group extends Eloquent {

		/**
		 * Relationships
		 *
		 */
		public function offenses() {
			return $this->hasMany('Offense')->orderBy('section');
		}


		public function try_create($info, $actions) {
			
			$validator = Validator::make(
			    $info,
			    array(
			        'section' => 'required|unique:offenses',
			        'description' => 'required',
			    )
			);

			if ($validator->fails()) {
				return Redirect::to('group/'.$this->id.'/offense')
					->withErrors($validator);
			}
			
			//somehow validation successful
			
			//create new offense
			$offense = new Offense($info);
			$offense = $this->offenses()->save($offense);

			//populate actions
			$offense->actions()->attach($actions['1st'], array('order'=>1));
			$offense->actions()->attach($actions['2nd'], array('order'=>2));
			$offense->actions()->attach($actions['3rd'], array('order'=>3));
			$offense->actions()->attach($actions['4th'], array('order'=>4));
			$offense->actions()->attach($actions['5th'], array('order'=>5));

			return Redirect::to('group/'.$this->id.'/offense');
		}

	}
?>