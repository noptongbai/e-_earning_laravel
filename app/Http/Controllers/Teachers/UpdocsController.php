<?php namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\TeachersController;
use Illuminate\Http\Request;
use App\Content;
use App\Docs;
use App\Subjects;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\support\Facades\Auth;


class UpdocsController extends TeachersController {
	


	public function viewGalleryList($name){
		$galleries = Docs::all();
		$subject = Subjects::where('name', $name)->first();
		return view('teacher.updocs.index')->with('galleries',$galleries)->with('name',$name)->with('subject_id',$subject->id);
	}

	public function newGalleryPics($name){

		return view('teacher.updocs.view')->with('name',$name);
	}
	public function saveGalleryList(Request $request,$name){


		$validator = Validator::make($request->all(),[
				'gallery_name' => 'required|min:3',
			]);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}


		$subject = Subjects::where('name', $name)->first();
		$gallery = new Docs;
		$gallery->subject_id = $subject->id;
		$gallery->name = $request->input('gallery_name');
		$gallery->created_by=Auth::user()->id;
		$gallery->published= 1;
		$gallery->save();
		if($request->get('image')){
		$image=Content::findOrFail($request->get('image'));
		$image->docs_id = $gallery->id;
		$image->save();

		$currentGallery = Docs::findOrFail(0);
		$images = $currentGallery->contents();

		foreach ($currentGallery->contents as $image) {
			unlink(public_path($image->file_path));
		}
		$images->delete();
		}


		return redirect('teacher/'.$name.'/updocs/list')->with('gallery',$gallery);
	}
		public function updateGalleryList(Request $request,$name,$id){
			
			$validator = Validator::make($request->all(),[
				'gallery_name' => 'required|min:3',
			]);
			if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
			}

			if($request->get('image')){
			$gallery=Docs::findOrFail($id);
			$image=Content::findOrFail($request->get('oldimage'));
			unlink(public_path($image->file_path));
			$image->delete();
			$gallery->name = $request->get('gallery_name');
			$gallery->save();
			

			$image=Content::findOrFail($request->get('image'));
			$image->docs_id = $id;
			$image->save();

			
			$currentGallery = Docs::findOrFail(0);
			$images = $currentGallery->contents();

			foreach ($currentGallery->contents as $image) {
			unlink(public_path($image->file_path));
			}
			$images->delete();
			}

			else{
				$gallery=Docs::findOrFail($id);
				$gallery->name = $request->get('gallery_name');
				$gallery->save();
			}
		return redirect('teacher/'.$name.'/updocs/list')->with('gallery',$gallery);
	}
	public function viewGalleryPics($name,$id){
		$gallery = Docs::findOrFail($id);
		return view('teacher.updocs.update')->with('gallery',$gallery)->with('name',$name);
		
	}
	public function doImageUpload(Request $request){
		

		$file = $request->file('file');
		$filename = uniqid() . $file->getClientOriginalName();
		$file->move('gallery/images',$filename);

		$image =new Content;
		$image->file_name = $filename;
		$image->file_size = $file->getClientSize();
		$image->file_mime = $file->getClientMimeType();
		$image->file_path =  'gallery/images/' .$filename;
		$image->created_by = Auth::user()->id;
		$image->save();
		return $image;
	}
	public function deleteGallery($id){
		$currentGallery = Docs::findOrFail($id);
		if($currentGallery->created_by != Auth::user()->id){
			abort('404','You are not allowed to delete this gallery');
		}
		$images = $currentGallery->contents();

		foreach ($currentGallery->contents as $image) {
			unlink(public_path($image->file_path));
		}
		$images->delete();
		$currentGallery->delete();

		return redirect()->back();
	}
}