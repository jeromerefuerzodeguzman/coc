<?php

	class Offense extends Eloquent {

		protected $fillable = array('description', 'section');

		public function actions() {
	        return $this->belongsToMany('Action')->select('order', 'action_id')->orderBy('order');
	    }


	    public static function try_update($id, $actions) {
			$offense = static::find($id);

			$action1 = DB::table('action_offense')->where('offense_id', $id)->where('order', 1)->get();
			$action2 = DB::table('action_offense')->where('offense_id', $id)->where('order', 2)->get();
			$action3 = DB::table('action_offense')->where('offense_id', $id)->where('order', 3)->get();
			$action4 = DB::table('action_offense')->where('offense_id', $id)->where('order', 4)->get();
			$action5 = DB::table('action_offense')->where('offense_id', $id)->where('order', 5)->get();

			if(empty($action1)) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 1, 'action_id' => $actions['e1']));
			} else {
				DB::table('action_offense')->where('offense_id', $id)->where('order', 1)->update(array('action_id' => $actions['e1']));
			}

			if(empty($action2)) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 2, 'action_id' => $actions['e2']));
			} else {
				DB::table('action_offense')->where('offense_id', $id)->where('order', 2)->update(array('action_id' => $actions['e2']));
			}

			if(empty($action3)) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 3, 'action_id' => $actions['e3']));
			} else {
				DB::table('action_offense')->where('offense_id', $id)->where('order', 3)->update(array('action_id' => $actions['e3']));
			}

			if(empty($action4)) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 4, 'action_id' => $actions['e4']));
			} else {
				DB::table('action_offense')->where('offense_id', $id)->where('order', 4)->update(array('action_id' => $actions['e4']));
			}

			if(empty($action5)) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 5, 'action_id' => $actions['e5']));
			} else {
				DB::table('action_offense')->where('offense_id', $id)->where('order', 5)->update(array('action_id' => $actions['e5']));
			}


			/*//update 5 actions
			$update1 = DB::table('action_offense')->where('offense_id', $id)->where('order', 1)->update(array('action_id' => $actions['e1']));
			$update2 = DB::table('action_offense')->where('offense_id', $id)->where('order', 2)->update(array('action_id' => $actions['e2']));
			$update3 = DB::table('action_offense')->where('offense_id', $id)->where('order', 3)->update(array('action_id' => $actions['e3']));
			$update4 = DB::table('action_offense')->where('offense_id', $id)->where('order', 4)->update(array('action_id' => $actions['e4']));
			$update5 = DB::table('action_offense')->where('offense_id', $id)->where('order', 5)->update(array('action_id' => $actions['e5']));

			var_dump($action1);
			var_dump($action2);
			var_dump($action3);
			var_dump($action4);
			var_dump($action5);

			if($update1 == 0) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 1, 'action_id' => $actions['e1']));
			}
			if($update2 == 0) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 2, 'action_id' => $actions['e2']));
			}
			if($update3 == 0) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 3, 'action_id' => $actions['e3']));
			}
			if($update4 == 0) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 4, 'action_id' => $actions['e4']));
			}
			if($update5 == 0) {
				DB::table('action_offense')->insert(array('offense_id' => $id, 'order' => 5, 'action_id' => $actions['e5']));
			}
*/
			return $offense;
	    }
	}
?>