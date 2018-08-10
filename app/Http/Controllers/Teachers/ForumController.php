<?php namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\TeachersController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use Auth;
use App\Models\Users;
use App\Models\ForumGroup;
use App\Models\ForumCategory;
use App\Models\ForumThread;
use App\Models\ForumComment;
class ForumController extends TeachersController{
  	 public function index($name){
  	 	$groups = ForumGroup::all();
        $categories =ForumCategory::all();
        foreach (Users::find(Auth::user()->id)->subjects as $subject) {
            if($subject->name == $name){

                return view('teacher.forum.index')->with('groups',$groups)->with('categories',$categories)->with('subject_id',$subject->id)->with('name',$name);        
            }
    }
     abort(403, 'You dont have this subject');
}
    
    
     public function category($name,$id){
        $category = ForumCategory::find($id);
        if($category==null){
            return redirect()->to('teacher/'.$name.'/forum')->with('fail','category not found');
        }
        $threads = $category->threads()->get();
       
        return view('teacher.forum.category')->with('category',$category)->with('threads',$threads)->with('name',$name);
    
    }
    public function deleteCategory($name,$id){

        $category = ForumCategory::find($id);
        if($category==null)
        {
            return redirect()->to('teacher/'.$name.'/forum')->with('fail','The category not exits');
        }
        
        $threads    = $category->threads();
        $comments   = $category->comments();

        $delT = true;
        $delCo = true;
        
        if($threads->count()>0){
            $delT=$threads->delete();
        }
        if($comments->count()>0){
            $delCo=$comments->delete();
        }

        if($delT&&$delCo&&$category->delete()){
            return redirect()->to('teacher/'.$name.'/forum')->with('success','The category was deleted.');
        }
        else{
            return redirect()->to('teacher/'.$name.'/forum')->with('fail','The category was not  deleted.');
        }

    }
    public function storeCategory(Request $request,$name,$id){
        
     
            $group =ForumGroup::find($id);
            if($group==null){
                return redirect()->to('teacher/'.$name.'/forum')->with('fail','The group not exits');
            }
            $category=new ForumCategory;
            $category->title =$request->get('category_name');
            $category->author_id =Auth::user()->id;
            $category->group_id = $id;
            if($category->save()){
                return redirect()->to('teacher/'.$name.'/forum')->with('success','The category was created');
            }
            else
            {
                return redirect()->to('teacher/'.$name.'/forum')->with('fail','The category cant created');
            }
        
    }
    public function newThread($name,$id)
    {
        
        return view('teacher.forum.newthread')->with('id',$id)->with('name',$name);
    
    
    }

    public function storeThread(Request $request,$name,$id){
        $category = ForumCategory::find($id);
        if($category==null){
            return redirect()->to('teacher/'.$name.'/forum/thread/'.$id.'/new')->with('fail'," you posted to an invalid category");
        }

        else
        {
            $thread = new ForumThread;
            $thread->title = $request->get('title');
            $thread->body  = $request->get('body');
            $thread->category_id =$id;
            $thread->group_id = $category->group_id;
            $thread->author_id = Auth::user()->id;
            if($thread->save()){
                return redirect()->to('teacher/'.$name.'/forum/thread/'.$thread->id)->with('success',"Your thread has been saved");

            }
            else{
                return redirect()->to('teacher/'.$name.'/forum/thread/'.$id.'/new')->with('fail',"Your thread error")->withInput();
            }
        }    

    }
    public function thread($name,$id){

        $thread = ForumThread::find($id);
        if($thread==null){
            return redirect()->to('teacher/'.$name.'/forum')->with('fail','The thread not exist');
        }

        $author = $thread->author()->first()->name;
        return view('teacher.forum.thread')->with('thread',$thread)->with('author',$author)->with('name',$name);
    }
    public function deleteThread($name,$id)
    {
        $thread = ForumThread::find($id);
        if($thread==null){
          return redirect()->to('teacher/'.$name.'/forum')->with('fail','Thread doesnt exist');
        }
        $category_id = $thread->category_id;
        $comments = $thread->comments;
        if($comments->count()>0){
            if($comments->delete() && $thread->delete())
                return redirect()->to('teacher/'.$name.'/forum/category/'.$category_id)->with('success','Thread was deleted');
            else{
                return redirect()->to('teacher/'.$name.'/forum/category/'.$category_id)->with('fail','Thread was not deleted');
            }
        }
        else{
             if($thread->delete())
                return redirect()->to('teacher/'.$name.'/forum/category/'.$category_id)->with('success','Thread was deleted');
            else{
                return redirect()->to('teacher/'.$name.'/forum/category/'.$category_id)->with('fail','Thread was not deleted');
            }
        }
    }
    public function storeComment(Request $request,$name,$id){
        $thread =  ForumThread::find($id);
        if($thread==null){
            return redirect()->to('teacher/'.$name.'/forum')->with('fail','Thread doesnt exist');
        }
        $validator = Validator::make($request->all(), [
             'body'  =>  'required|min:5|max:65000'
        ]);
        if($validator->fails()){
            return redirect()->to('teacher/'.$name.'/forum/thread/'.$thread->id)->withInput()->withErrors($validator)->with('fail',"your input doesnt match the requirements");
        }
        else{
            $comments = new ForumComment;
            $comments->body  = $request->get('body');
            $comments->author_id = Auth::user()->id;
            $comments->thread_id = $id;
            $comments->category_id =$thread->category->id;
            $comments->group_id = $thread->group->id;
            if($comments->save()){
                return redirect()->to('teacher/'.$name.'/forum/thread/'.$thread->id)->with('success',"Your thread has been saved");

            }
            else{
                return redirect()->to('teacher/'.$name.'/forum/thread/'.$thread->id)->with('fail',"Your thread error");
            }
        }
    }
    public function deleteComment($name,$id){
        $comment = ForumComment::find($id);
        if($comment==null){
            return redirect()->to('teacher/'.$name.'/forum')->with('fail','Comments doesnt exist');
        }
        $threadid = $comment->thread->id;
        if($comment->delete()){
            return redirect()->to('teacher/'.$name.'/forum/thread/'.$threadid)->with('success',"Your comments has been deleted");
        }
        else 
             return redirect()->to('teacher/'.$name.'/forum/thread/'.$threadid)->with('fail',"Your comments has been deleted");
    }
}

