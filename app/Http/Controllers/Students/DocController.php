<?php namespace App\Http\Controllers\Students;
use App\Http\Controllers\StudentsController;
use Illuminate\Http\Request;
use Auth;
use App\Models\Users;

class DocController extends StudentsController{
      public function getIndex($name)
    {
    	foreach (Users::find(Auth::user()->id)->subjects as $subject) {
    		if($subject->name == $name){
    			return view('student.docs.index')->with('subject_id',$subject->id)->with('name',$name);
    	}
    }
     abort(403, 'You dont have this subject');
	}
    
}
