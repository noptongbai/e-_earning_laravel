<?php  namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\TeachersController;
use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Answer;
use App\Models\Users;
use Auth;
use App\Whotest;
use App\Subjective;
use App\Subjective2;
class ResultController extends TeachersController{
      public function index($name,$id)
    {   
        $test = Test::find($id);
    	  return view('teacher.createtest.result')->with('test_id',$id)->with('name',$name)->with('test',$test);
    
    }
    public function data($name,$id)
    {
       $test_id = Whotest::find($id)->test_id;
       $question= Test::find($test_id)->questions;
       $user = Whotest::find($id)->student_id;
       return view('teacher.createtest.data')->with('user',$user)->with('question',$question)->with('name',$name)->with('id',$id);
    }

    public function store(Request $request,$name,$id)
    {
            $test_id = Whotest::find($id)->test_id;
            $question= Test::find($test_id)->questions;
            $i=1;
            $score =0;

            foreach ($question as $qns) {
              $score1 = $request->get('score'.$i);
              $score = $score+$score1;
              $i++;
            }

            $whotest = Whotest::find($id);
            $whotest->score = $score;
            $whotest->checked = 'Y';
            $whotest->save();



          return  redirect()->to('teacher/'.$name.'/test');
        
    }

    public function delete($name,$id){
        $whotest = Whotest::find($id);
        $user_id = $whotest->student_id;
        $test_id = $whotest->test_id;
        $whotest->delete();
        if(Test::find($test_id)->type==3){

          foreach (Test::find($test_id)->questions as $qns) {
            # code...
          
              foreach(Subjective::where('question_id','=',$qns->id)->get() as $u){
                      if($u->user_id==$user_id){
                          $u->delete();
                          unlink($u->file_path);
                      }
              }

              foreach(Subjective2::where('question_id','=',$qns->id)->get() as $u){
                      if($u->user_id==$user_id){
                          $u->delete();
                      }
              }

          }

        }
        else{

        }
        return redirect()->back();
    }
 
  }

