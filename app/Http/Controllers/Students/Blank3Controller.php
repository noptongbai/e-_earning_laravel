<?php namespace App\Http\Controllers\Students;
use App\Http\Controllers\StudentsController;
use App\Ads;

class Blank3Controller extends StudentsController {
	public function getIndex(){
		$ads = Ads::find(1);

    return view('student.index')->with('ads',$ads);
	}
	public function index(){
		echo 'Blank page <br/>';
		//return view('admin.blank');
	}
}