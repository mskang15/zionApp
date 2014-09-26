<?php

class Study extends Eloquent {
    //protected $table = 'users';

    public $timestamps = false;
    protected $fillable = array('studyTitle', 'shortName', 'order');

    public function members() {
        return $this->hasMany('Member');
    }

}