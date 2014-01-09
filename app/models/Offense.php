<?php

	class Offense extends Eloquent {

		protected $fillable = array('description', 'section');

		public function actions()
	    {
	        return $this->belongsToMany('Action')->orderBy('order');
	    }
	}
?>