<?php

class UsersController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getSignup() {
		$this->layout->content = View::make('users.signup');
	}

    public function getCreateTeacherView() {
        $this->isAdmin();
        if (!Auth::check()){
            return Redirect::to('login');
        }
        if(!$this->isAdmin()){
            return Redirect::to('/')->with('message', 'Only Admin can have access');
        }
        $this->layout->content = View::make('users.create-teacher');
    }

	public function postCreateTeacher() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->username = Input::get('username');
			$user->name = Input::get('name');
			$user->role = Input::get('role');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::to('members')->with('message', 'You have successfully created a teacher!');
		} else {
			return Redirect::to('users/create-teacher')->with('message', 'The following errors occurred:')->withErrors($validator)->withInput();
		}
	}

	public function getSignin() {
		$this->layout->content = View::make('users.signin');
	}

	public function postSignin() {
		if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
            $teacherName = User::find(Auth::user()->id)->name;
			return Redirect::to('/')->with('message', 'Welcome '.$teacherName.'!');
		} else {
			return Redirect::to('users/signin')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}
	}

	public function getSignout() {
		Auth::logout();
		return Redirect::to('users/signin')->with('message', 'Your are now signed out!');
	}

    public function getCreateMemberView() {
        if (!Auth::check()){
            return Redirect::to('login');
        }
        $this->layout->content = View::make('users.create-member');
    }

    public function postStudy() {
        $studyProgress = new studyProgress;
        $studyProgress->teacher_id = Input::get('teacher_id');
        $studyProgress->member_id = Input::get('member_id');
        $studyProgress->study_id = Input::get('study_id');
        $studyProgress->study_date = date("Y-m-d");
        $studyProgress->save();

        return Redirect::to('members/'. Input::get('member_id'))->with('message', 'The study table has been updated!');
    }

    public function postCreateMember() {
        $validator = Validator::make(Input::all(), Member::$rules);

        if ($validator->passes()) {

        $member = new Member;
        $member->created_by = Auth::user()->id;
        $member->name = Input::get('name');
        $member->branch = Input::get('branch');
        $member->baptism_date = Input::get('baptism_date');
        $member->save();
        return Redirect::to('members')->with('message', 'Member was successfully created!');
        } else {
            return Redirect::to('users/create-member')->with('message', 'The following errors occurred:')->withErrors($validator)->withInput();
        }

    }

    public function postDelete() {

        $studyProgress = StudyProgress::whereRaw('member_id ='.Input::get('member_id').' and study_id='.Input::get('study_id'))->first();
        $studyProgress->delete();
        return Redirect::to('members/'. Input::get('member_id'))->with('message', 'The study has been successfully deleted!');
    }

    public function isAdmin(){
        if(Auth::user()->role == "admin"){
            return true;
        }
    }


}