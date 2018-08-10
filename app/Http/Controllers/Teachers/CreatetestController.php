<?php namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\TeachersController;
use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Answer;
use App\Subjects;
use App\Whotest;
 
class CreatetestController extends TeachersController{
     public function index($name)
    {
    
    	return view('teacher.createtest.addstep1')->with('name',$name);

    }
    public function create(Request $request,$names)
    {
      	$name = $request->get('name');
		$type = $request->get('type');
		$quantity = $request->get('total');
		$time = $request->get('time');
		return  view('teacher.createtest.addstep2')->with('testname',$name)
		->with('type',$type)->with('total',$quantity)->with('time',$time)->with('name',$names);
    }
   	public function deletetest($id){
   		
   		$test = Test::findOrFail($id);
		
		$questions =$test->questions();

		foreach ($test->questions as $question) {
			$answers = $question->answers();
			$answers->delete();
		}

		$questions->delete();

		$test->delete();

		return redirect()->back();

   	}
    public function createdetail(Request $request,$name)
    {
    
    	$test = new Test;
    	$test->quantity= $request->get('total');
    	$test->name    = $request->get('testname');
    	$test->type    = $request->get('type');
    	$test->time    = $request->get('time');
    	$subject = Subjects::where('name', $name)->first();
    	$test->subject_id = $subject->id;
		  $test->save();
       	if($request->get('type')==1){
       		for($i=1;$i<=$request->get('total');$i++){
			$question = new Question;
			$question->test_id = $test->id;
			$question->question= $request->get('qns'.$i);
			$question->answer = $request->get('ans'.$i);
			$question->save();
			$option1 = new Answer;
			$option1->question_id = $question->id;
			$option1->answer = $request->get($i.'1');
			$option1->save();
			$option2 = new Answer;
			$option2->question_id = $question->id;
			$option2->answer = $request->get($i.'2');
			$option2->save();
			$option3 = new Answer;
			$option3->question_id = $question->id;
			$option3->answer = $request->get($i.'3');
			$option3->save();
			$option4 = new Answer;
			$option4->question_id = $question->id;
			$option4->answer = $request->get($i.'4');
			$option4->save();

       	}
       	return  redirect()->to('teacher/'.$name.'/test');
       }
       else if($request->get('type')==2){
       		for($i=1;$i<=$request->get('total');$i++){
			$question = new Question;
			$question->test_id = $test->id;
			$question->question= $request->get('qns'.$i);
			$question->answer = $request->get('ans'.$i);
			$question->save();
			
		}
		return  redirect()->to('teacher/'.$name.'/test');
       }
       else{
       		for($i=1;$i<=$request->get('total');$i++){
       		$question = new Question;
			$question->test_id = $test->id;
			$question->question= $request->get('qns'.$i);
			$question->save();
		}
			return  redirect()->to('teacher/'.$name.'/test');
       }
   }
	
  
    public function edit($name,$id){
    		$test = Test::find($id);

    		return view('teacher.createtest.updatestep1')->with('name',$name)->with('test',$test);
    }
    public function editdetail(Request $request,$names,$id){
    	
      $test = Test::find($id);
     $name = $request->get('name');
	   $quantity = $request->get('total');
	   $time = $request->get('time');
       

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
        return view('teacher.createtest.updatestep2')->with('question',$question)->with('data',$data)->with('testname',$name)
		    ->with('test',$test)->with('total',$quantity)->with('time',$time)->with('name',$names);
       }
       elseif ($test->type==2){

            return view('teacher.createtest.updatestep2')->with('question',$question)->with('test',$test)->with('name',$names)
            ->with('testname',$name)->with('time',$time)->with('total',$quantity);
       }
       else{

             return view('teacher.createtest.updatestep2')->with('question',$question)->with('test',$test)->with('name',$names)
            ->with('testname',$name)->with('time',$time)->with('total',$quantity);
       }

    }
    public function editsavedetail(Request $request,$name,$id){
          $test = Test::find($id);
          $test->quantity= $request->get('total')+$test->questions->count();
          $test->name    = $request->get('testname');
          $test->type    = $request->get('type');
          $test->time    = $request->get('time');
          $test->save();

          if($request->get('type')==1){

            $i=1;
            foreach ($test->questions as $question) {
              $question = Question::find($question->id);
              $question->question= $request->get('qns'.$i);
              $question->answer = $request->get('ans'.$i);
              $question->save();
              $j=1;
              foreach ($question->answers as $answer ) {
                $answer = Answer::find($answer->id);
                $answer->answer = $request->get($i.$j);
                $answer->save();
                $j++;
              }

              $i++;
            }
          for($i=1+$test->questions->count();$i<=$request->get('total')+$test->questions->count();$i++){
            $question = new Question;
            $question->test_id = $test->id;
            $question->question= $request->get('qns'.$i);
            $question->answer = $request->get('ans'.$i);
            $question->save();
            $option1 = new Answer;
            $option1->question_id = $question->id;
            $option1->answer = $request->get($i.'1');
            $option1->save();
            $option2 = new Answer;
            $option2->question_id = $question->id;
            $option2->answer = $request->get($i.'2');
            $option2->save();
            $option3 = new Answer;
            $option3->question_id = $question->id;
            $option3->answer = $request->get($i.'3');
            $option3->save();
            $option4 = new Answer;
            $option4->question_id = $question->id;
            $option4->answer = $request->get($i.'4');
            $option4->save();

        }
        return  redirect()->to('teacher/'.$name.'/test');
       }
       else if($request->get('type')==2){

           $i=1;
            foreach ($test->questions as $question) {
              $question = Question::find($question->id);
              $question->question= $request->get('qns'.$i);
              $question->answer = $request->get('ans'.$i);
              $question->save();
              $j=1;
              foreach ($question->answers as $answer ) {
                $answer = Answer::find($answer->id);
                $answer->answer = $request->get($i.$j);
                $answer->save();
                $j++;
              }

              $i++;
            }
          for($i=1+$test->questions->count();$i<=$request->get('total')+$test->questions->count();$i++){
            $question = new Question;
            $question->test_id = $test->id;
            $question->question= $request->get('qns'.$i);
            $question->answer = $request->get('ans'.$i);
            $question->save();
      
    }
    return  redirect()->to('teacher/'.$name.'/test');
       }
       else{
           $i=1;
            foreach ($test->questions as $question) {
              $question = Question::find($question->id);
              $question->question= $request->get('qns'.$i);
              $question->answer = $request->get('ans'.$i);
              $question->save();
              $j=1;
              foreach ($question->answers as $answer ) {
                $answer = Answer::find($answer->id);
                $answer->answer = $request->get($i.$j);
                $answer->save();
                $j++;
              }

              $i++;
            }
          for($i=1+$test->questions->count();$i<=$request->get('total')+$test->questions->count();$i++){
          $question = new Question;
          $question->test_id = $test->id;
          $question->question= $request->get('qns'.$i);
          $question->save();
    }
      return  redirect()->to('teacher/'.$name.'/test');
       }

    }
    public function deleteQuestion($name,$id){
      
      $question = Question::find($id);
      $test = $question->test;
      $test->quantity = $test->quantity -1;
      $test->save();

    foreach ($question->answers as $answer) {
      $answer->delete();
    }

    $question->delete();

    
      return redirect()->to('teacher/'.$name.'/test');

    }

}