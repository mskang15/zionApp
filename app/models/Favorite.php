<?php

class Favorite extends Eloquent {

	public function user() {
   		return $this->belongsTo('User');
   	}

   	public function snippet() {
   		return $this->belongsTo('Snippet');
   	}
}