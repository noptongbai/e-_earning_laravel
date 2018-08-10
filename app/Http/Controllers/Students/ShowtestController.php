<?php namespace App\Http\Controllers\Students;
use App\Http\Controllers\StudentsController;
use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Answer;
use App\Whotest;
use Auth;
use App\Models\Users;
use App\Subjective;
use App\Subjective2;
class ShowtestController extends StudentsController{
      public function index($name)
    {
      $var  = 5;
    	foreach (Users::find(Auth::user()->id)->subjects as $subject) {
        if($subject->name == $name){

          return view('student.showtest.index')->with('subject_id',$subject->id)->with('name',$name)->with('var',$var);
      }
    }
     abort(403, 'You dont have this subject');
    }
    public function create()
    {
       
    }
    public function store(Request $request,$name,$id)
    {
            $sum=0;
            $test= Test::find($id);
            $number =$test->quantity;
            if($test->type==1||$test->type==2){
            for($i=1;$i<=$number;$i++){
            $questionid = $request->get('qns'.$i);
            $qns = Question::find($questionid);
            $realanswer = $qns->answer;
            $answer = $request->get('ans'.$i);
            if($realanswer===$answer){
                $sum++;
            }
		  }
            $test->save();
            $b=true;
            foreach (Whotest::where('test_id','=',$id)->get() as $w) {
                  if($w->student_id==Auth::user()->id){
                    $b=false;
                    break;
                  }
            }
            if($b){
            $whotest = new Whotest;
            $whotest->score = $sum;
            $whotest->test_id = $id;
            $whotest->student_id = Auth::user()->id;
            $whotest->checked = 'Y';
            $whotest->save();
            }
            return view('student.showtest.result')->with('test',$test)->with('score',$sum)->with('name',$name);
          }
          else {
            $test=Test::find($id);
             $b=true;
            foreach (Whotest::where('test_id','=',$id)->get() as $w) {
                  if($w->student_id==Auth::user()->id){
                    $b=false;
                    break;
                  }
            }
              if($b){
             $i=1;
            foreach ($test->questions as $qns ) {
                  $subjective = new Subjective2;
                  $subjective->text = $request->get('desc'.$i);
                  $subjective->user_id = Auth::user()->id;
                  $subjective->question_id = $qns->id;
                  $subjective->save();
                  $i++;
            }
            $whotest = new Whotest;
            $whotest->test_id = $id;
            $whotest->student_id =  Auth::user()->id;
            $whotest->save();
            }
          return view('student.showtest.result')->with('test',$test)->with('name',$name);
          }
    }


    public function show($name,$id)
    {
        
      $test = Test::where('id',$id)->first();     
       $question = Question::where('test_id', '=',$id)->get();
       $data = [];
       $j=1;
       if($test->type==1){
       foreach ($question as $qns) {
           $questionid = $qns->id;
           $answer = Answer::where('question_id', '=',$questionid)->get();
           $i=1;
           foreach ($answer as $ans)
            {
                     $data = array_add($data, 'answer'.$i.$j, $ans);
                     $i++;
            }
            $j++;
       }
            return view('student.showtest.show')->with('question',$question)->with('data',$data)->with('test',$test)->with('name',$name);
       }
       elseif ($test->type==2){

            return view('student.showtest.show')->with('question',$question)->with('test',$test)->with('name',$name);
       }
       else{

            return view('student.showtest.show')->with('question',$question)->with('test',$test)->with('name',$name);


       }

       
      
      
      
        
    }


    public function upload(Request $request,$id){


        if($request->exists('btn-upload')){
            $file = $request->file('uploader'.$id);
            $path = 'images/uploads';
            $filename = $file->getClientOriginalName();
            $file->move('images/uploads',$file->getClientOriginalName());
            $image = new Subjective;
            $image->question_id = $id;
            $image->user_id = Auth::user()->id;
            $image->file_name = $filename;
            $image->file_path = 'images/uploads/'.$filename;
            $image->save();
            echo 'Uploaded';
        }
    
        return redirect()->back();


    }
    public function destroy($id){

        
       
    }
    public function edit($id){

      
    }
    public function update(Request $request,$id){



            
    }
    public function getDelete($id){
    $a=Subjective::find($id);
    unlink($a->file_path);
    $a->delete();
    return redirect()->back();
  }
}
