<?php

class SnippetsController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex() {
		$this->layout->content = View::make('snippets.index')
			->with('snippets', Snippet::take(5)->orderBy('id','desc')->get());
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), Snippet::$rules);

		if ($validator->passes()) {
			$snippet = new Snippet;
			$snippet->name = Input::get('name');
			$snippet->code = Input::get('code');
			$snippet->lang = Input::get('lang');
			$snippet->slug = Str::slug(Input::get('name'));
			$snippet->save();

			$slug = Snippet::where('name','=',Input::get('name'))->first()->slug;

			return Redirect::to('snippets/view/'.$slug)->with('message', 'Code shared!');
		} else {
			return Redirect::to('snippets/index')->with('message', 'The following errors occurred:')->withErrors($validator)->withInput();
		}
	}

	public function getView($slug) {
		$this->layout->content = View::make('snippets.view')->with('snippet', Snippet::where('slug','=',$slug)->first());
	}
}