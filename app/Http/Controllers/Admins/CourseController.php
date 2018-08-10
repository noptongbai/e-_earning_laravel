<?php namespace App\Http\Controllers\Admins;
use App\Http\Controllers\AdminsController;
use App\Subjects;
use App\Models\ForumGroup;
use App\Models\ForumCategory;
use App\Models\ForumThread;
use App\Models\ForumComment;
use Illuminate\Http\Request;


class  CourseController extends AdminsController {
	public function getIndex(){
		$subject = Subjects::orderBy('id')->paginate(50);//->get();
		
		return view('admin.course.index',['subject'=>$subject]);
	}
	
	public function getForm($id = 0){
		if($id != 0){
			$subject = Subjects::where('id',$id)->first();
			if(!$subject) return redirect('admin/course/form');
		}else{ $subject  = false;}
		$data = array('id' => $id,'subject' => $subject);
		return view('admin.course.form',$data);
	}
	
		
	public function getProfile(){

	}
	
	
	
	public function postForm(Request $request){
		$id = $request->get('id');
		$chk = Subjects::where('id',$id)->first();
		if($chk){
				$subject  = $chk;
				$subject->name  = $request->get('name');
				$subject->save();
				$group = ForumGroup::where('subject_id','=',$subject->id)->first();
				$group->title = $request->get('name');
				$group->save();
		}
		else{
			$subject = new Subjects;
			$subject->name  = $request->get('name');
			$subject->save();
			$group=new ForumGroup;
    		$group->title =$request->get('name');
    		$group->subject_id =$subject->id;
    		$group->save();
		}
		
		
		return redirect()->to('admin/course');
	}
	
	public function postAction(Request $request){
		$arr = $request->get('id');
		if($request->exists('delete') && $arr){
			foreach($arr as $key => $id){
		Subjects::where('id',$id)->delete();
		$group = ForumGroup::where('subject_id',$id)->first();
    	$group = ForumGroup::find($group->id);
    	
    	$categories = $group->categories();
    	$threads    = $group->threads();
    	$comments   = $group->comments();


    	$delCa=true;
    	$delT = true;
    	$delCo = true;

    	if($categories->count()>0){
    		$delCa=$categories->delete();
    	}
    	if($threads->count()>0){
    		$delT=$threads->delete();
    	}
    	if($comments->count()>0){
    		$delCo=$comments->delete();
    	}
    	$group->delete();
			}
		}
		return redirect()->back();
	}
	
	public function getDelete($id){
		Subjects::where('id',$id)->delete();
		$group = ForumGroup::where('subject_id',$id)->first();
    	$group = ForumGroup::find($group->id);
    	$categories = $group->categories();
    	$threads    = $group->threads();
    	$comments   = $group->comments();


    	$delCa=true;
    	$delT = true;
    	$delCo = true;

    	if($categories->count()>0){
    		$delCa=$categories->delete();
    	}
    	if($threads->count()>0){
    		$delT=$threads->delete();
    	}
    	if($comments->count()>0){
    		$delCo=$comments->delete();
    	}
    	$group->delete();
		return redirect()->back();
	}
}