<?php namespace App\Http\Controllers\Admins;
use App\Http\Controllers\AdminsController;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\Admins\userRequest;
use Auth;

class  Manage1Controller extends AdminsController {
	public function getIndex(){
		
		$user = Users::where('type','=',"admin")->orderBy('id')->paginate(50);     
       
		return view('admin.manage1.index',['user'=>$user]);
	}
	
	public function getForm($id = 0){
		if($id != 0){
			$user = Users::where('id',$id)->first();
			if(!$user) return redirect('admin/user/form');
		}else{ $user = false;}
		$data = array('id' => $id,'user' => $user);
		return view('admin.manage1.form',$data);
	}
	
		
	public function getProfile(){
		$id = Auth::user()->id;
		$user = Users::where('id',$id)->first();
		if(!$user) return redirect('admin/admin/index');
		$data = array('id' => $id,'user' => $user);
		return view('admin.manage1.form',$data);
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
		$user->type 	= 'admin';
		$user->save();
		return redirect()->to('admin/admin');
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
		Users::where('id',$id)->delete();
		return redirect()->back();
	}
}