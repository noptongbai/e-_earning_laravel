<?php  namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\TeachersController;
use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Answer;
use App\Models\Users;
use Auth;
class AlltestController extends TeachersController{
      public function index($name)
    {
    	   foreach (Users::find(Auth::user()->id)->subjects as $subject) {
        if($subject->name == $name){

          return view('teacher.createtest.index')->with('subject_id',$subject->id)->with('name',$name);
      }
    }
     abort(403, 'You dont have this subject');
    }
    public function create()
    {
       
    }
    public function store(Request $request)
    {
            
      
        
    }

    public function destroy($id){

        
       
    }
    public function edit($id){

      
    }
    public function update(Request $request,$id){



            
    }
}
