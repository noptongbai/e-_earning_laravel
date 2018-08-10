<?php namespace App\Http\Controllers\Teachers;
use App\Http\Controllers\TeachersController;
use Auth;
use App\Models\Users; 
use App\Ads;
class Blank2Controller extends TeachersController {
	public function getIndex(){
	    $ads = Ads::find(1);
    return view('teacher.index')->with('ads',$ads);
	}
	public function index(){
		echo 'Blank page <br/>';
		//return view('admin.blank');
	}
}