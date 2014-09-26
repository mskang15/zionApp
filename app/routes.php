<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', array('uses'=>'MembersController@getIndex', 'before' => 'auth'));
Route::get('/login', array('uses'=>'UsersController@getSignin'));
Route::get('/members/{id}', array('uses'=>'MembersController@getView'));
Route::get('/users/create-member', array('uses'=>'UsersController@getCreateMemberView'));
Route::post('/users/create-member', array('uses'=>'UsersController@postCreateMember'));
Route::get('/users/create-teacher', array('uses'=>'UsersController@getCreateTeacherView'));
Route::post('/users/create-teacher', array('uses'=>'UsersController@postCreateTeacher'));

Route::controller('users', 'UsersController');
Route::controller('studies', 'StudiesController');
Route::controller('members', 'MembersController');