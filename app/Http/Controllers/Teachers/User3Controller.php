<?php namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\TeachersController;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\Admins\userRequest;
use Auth;

class  User3Controller extends TeachersController {
	public function getIndex(){
		
	}
	
	public function getForm($id = 0){
		
	}
	
		
	public function getProfile(){
		$id = Auth::user()->id;
		$user = Users::where('id',$id)->first();
		if(!$user) return redirect('teacher/index');
		$data = array('id' => $id,'user' => $user);
		return view('teacher.user.form',$data);
	}
	
	
	
	public function postForm(userRequest $request){
		$id = $request->get('id');
		$user = Users::where('id',$id)->first();
		$user->name		= $request->get('name');
		$user->username	= $request->get('username');
		$user->email	= $request->get('email');
		if($request->get('password') != '')	$user->password	= bcrypt($request->get('password'));
		$user->tel		= $request->get('tel');
		$user->active 	= $request->has('active') ? 'Y' : 'N';
		$user->save();
		return redirect()->to('teacher/index');
	}
	
	public function postAction(Request $request){
		$arr = $request->get('id');
		if($request->exists('delete') && $arr){
			foreach($arr as $key => $id){
				Users::where('id',$id)->delete();
			}
		}
		return redirect()->back();
	}
	
	public function getDelete($id){
	
	}
}