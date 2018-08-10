<?php namespace App\Http\Controllers\Students;
use App\Http\Controllers\StudentsController;
use Illuminate\Http\Request;
use App\Models\Users;
use Auth;

class VideoController extends StudentsController{
      public function getIndex($name)
    {
    	foreach (Users::find(Auth::user()->id)->subjects as $subject) {
    		if($subject->name == $name){

    			return view('student.video.index')->with('subject_id',$subject->id)->with('name',$name);
    	}
    }
     abort(403, 'You dont have this subject');
	}
}
