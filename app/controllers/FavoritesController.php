<?php

class FavoritesController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('index', 'create')));
	}

	public function postCreate() {

		if (Auth::check()) {
			$favorite = new Favorite;
			$favorite->user_id = Auth::user()->id;
			$favorite->snippet_id = Input::get('snippet_id');
			$favorite->save();

			return Redirect::to('favorites')->with('message', 'Snippet successfully added to your favorites.');
		} else {
			return Redirect::to('users/signin')->with('message', 'You must sign in to favorite snippets.');
		}
	}

	public function getIndex() {
		$this->layout->content = View::make('favorites.index')->with('favorites', User::find(Auth::user()->id)->favorites);
	}
}