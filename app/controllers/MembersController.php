<?php


class MembersController extends BaseController {

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
    }

    public function getIndex() {
        if (!Auth::check()){
            return Redirect::to('login');
        }
        $members = Member::orderBy('id','desc')->paginate(5);
        $this->layout->content = View::make('members.index')
            ->with('members', $members);
    }

    public function getView($id) {
        if (!Auth::check()){
            return Redirect::to('login');
        }

        $studyProgresses = $studies = StudyProgress::where('member_id', '=', $id)->get()->toArray();

        $studies = Study::all()->toArray();

        $i = 0;
        foreach($studies as $study){
            foreach($studyProgresses as $studyProgress){
                if($study['id'] == $studyProgress['study_id']){
                    $studies[$i]['studied'] = true;
                    $studies[$i]['teacher_id'] = $studyProgress['teacher_id'];
                    $studies[$i]['member_id'] = $studyProgress['member_id'];
                    $studies[$i]['study_date'] = $studyProgress['study_date'];
                }
            }
            $i++;
        }

        $this->layout->content = View::make('members.view')
            ->with('studies', $studies)->with('id', $id);
    }
}