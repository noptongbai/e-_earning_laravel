<?php namespace App\Http\Controllers\Admins;
use App\Http\Controllers\AdminsController;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\Admins\userRequest;
use Auth;
use App\SubjectUser;
use App\Subjects;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;

class  OtherController extends AdminsController {


		public function index(Request $request){
			$number = $request->get('number');
			return view('admin.manage2.newform')->with('number',$number);
		}
		public function delete($id1,$id2){
			
			foreach (SubjectUser::where('subjects_id','=',$id1)->get() as $s) {

				if($s->users_id == $id2){
					$s->delete();
				}
			}
    		return redirect()->back();
		} 

		public function save(Request $request){
			$number = $request->get('number');
			$password = $request->get('password');
			for ($i=1; $i<=$number ; $i++) { 
				$user = New Users;
				$user->name		= $request->get('name'.$i);
				$user->username	= $request->get('username'.$i);
				$user->email	= $request->get('email'.$i);
				$user->password	= bcrypt($request->get('password'));
				$user->tel		= $request->get('tel'.$i);
				$user->active 	= 'Y' ;
				$user->type 	= 'student';
				$user->save();
			}
			return redirect()->to('admin/student');
		}








	}