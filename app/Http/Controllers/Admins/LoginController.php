<?php namespace App\Http\Controllers\Admins;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Routing\Controller;
use App\Http\Requests\Admins\LoginRequest;
use App\Ads;
use Illuminate\Contracts\Auth\Authenticatable;


class LoginController extends Controller {
	
	public function getIndex(){
			if (Auth::check()) {
					if(Auth::user()->type=='admin'){
   					return view('admin.index');
   				}
   				else if(Auth::user()->type=='student'){
   						$ads = Ads::find(1);
   					return view('student.index')->with('ads',$ads);
   				}
   				else if(Auth::user()->type=='teacher'){
   						$ads = Ads::find(1);
   					return view('teacher.index')->with('ads',$ads);
   				}
			}
			else{
					
					$ads = Ads::find(1);
					return view('admin.login')->with('ads',$ads);
			}	
			
		
	}
	public function postProcess(LoginRequest $request){
		$username = $request->input('username');
		$password = $request->input('password');
		$remember = ($request->has('remember')) ? true : false;
		//echo '[Username : '. $username .'][Password : '. $password .']';
		
		if(Auth::attempt(['username' => $username,'password'=>$password,'type'=>'admin'],$remember)){
			return redirect()->intended('/admin/index');
		}else if(Auth::attempt(['username' => $username,'password'=>$password,'type'=>'teacher'],$remember)){
			return redirect()->intended('/teacher/index');
		}
		else if(Auth::attempt(['username' => $username,'password'=>$password,'type'=>'student'],$remember)){
			return redirect()->intended('/student/index');
		}
		else{
			return redirect()->back()->with('message',"Error!! Username or Password Incorrect. \nPlease try again.");
		}
		
	}
	
	public function getLogout(){
		Auth::logout();
		return redirect('login');
	}
}