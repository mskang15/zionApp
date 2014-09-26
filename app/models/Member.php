<?php

class Member extends Eloquent {

    public $timestamps = false;
    protected $fillable = array('name', 'branch', 'baptism_date');
    public static $rules = array(
        'name'=>'required|alpha|min:2|unique:members',
        'branch'=>'required|alpha|min:2',
        'baptism_date'=>'required|date',
    );

    public function studies() {
        return $this->hasMany('Study');
    }
}