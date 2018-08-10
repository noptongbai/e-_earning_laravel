<?php namespace App\Http\Controllers\Admins;
use App\Http\Controllers\AdminsController;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\Admins\userRequest;
use Auth;
use App\SubjectUser;
use App\Subjects;

class  Manage3Controller extends AdminsController {
	public function getIndex(){
		$user = Users::where('type','=',"teacher")->orderBy('id')->paginate(50);   
		
		return view('admin.manage3.index',['user'=>$user]);
	}
	
	public function getForm($id = 0){
		if($id != 0){
			$user = Users::where('id',$id)->first();
			if(!$user) return redirect('admin/user/form');
		}else{ $user = false;}
		$data = array('id' => $id,'user' => $user);
		return view('admin.manage3.form',$data);
	}
	
		
	public function getProfile(){
		$id = Auth::user()->id;
		$user = Users::where('id',$id)->first();
		if(!$user) return redirect('admin/teacher/index');
		$data = array('id' => $id,'user' => $user);
		return view('admin.manage3.form',$data);
	}
	
	
	
	public function postForm(userRequest $request){
		$id = $request->get('id');
		$chk = Users::where('id',$id)->first();
		$user = $chk ? $chk : new Users;
		$user->name		= $request->get('name');
		$user->username	= $request->get('username');
		$user->email	= $request->get('email');
		if($request->get('password') != '')	$user->password	= bcrypt($request->get('password'));
		$user->tel		= $request->get('tel');
		$user->active 	= $request->has('active') ? 'Y' : 'N';
		$user->type 	= 'teacher';
		$user->save();
		return redirect()->to('admin/teacher');
	}
	
	public function postAction(Request $request){
		if($request->exists('delete')){
					if($arr = $request->get('id') ){
						foreach($arr = $request->get('id') as $key => $id){
						Users::where('id',$id)->delete();
					}
			}
			return redirect()->back();
		}
		else if($request->exists('addcourse')){
			if($arr = $request->get('id') ){
			$subject = Subjects::all();  
			$data = [];
      		 $i=0;
			foreach($arr as $key => $id){
                $i++;
				$user = Users::where('id',$id)->first();
				$data = array_add($data, 'user'.$i, $user);

			}	
			$data = array_add($data, 'number', $i);
			return view('admin.manage3.add',['data'=>$data],['subject'=>$subject]);
			}
			return redirect()->back();
		}
		else if($request->exists('addcourse2')){
				$arr = $request->get('id');
				$user = $request->get('user');
				if($arr  && $user){
				foreach($user as $key => $id1){
					foreach($arr as $key => $id2){
					    $su = SubjectUser::where('users_id','=',$id1)
					    ->where('subjects_id','=',$id2)->first();
					    if($su ==null){
						$su = new SubjectUser;
						$su->users_id = $id1;
						$su->subjects_id = $id2;
						$su->save();
						}
					}

				}
				return redirect()->to('admin/teacher')->with('success','Successfully Added');

		}
			return redirect()->back()->with('fail','Select something wrong');
	}


	}
	
	public function getDelete($id){
		Users::where('id',$id)->delete();
		return redirect()->back();
	}
}