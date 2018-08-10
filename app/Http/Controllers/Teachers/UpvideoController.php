<?php namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\TeachersController;
use Illuminate\Http\Request;
use App\Gallery;
use App\Image;
use App\Subjects;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\support\Facades\Auth;


class UpvideoController extends TeachersController {
	


	public function viewGalleryList($name){
		$galleries = Gallery::all();
		$subject = Subjects::where('name', $name)->first();
		return view('teacher.upvideo.index')->with('galleries',$galleries)->with('name',$name)->with('subject_id',$subject->id);
	}

	public function newGalleryPics($name){

		return view('teacher.upvideo.view')->with('name',$name);
	}
	public function saveGalleryList(Request $request,$name){


		$validator = Validator::make($request->all(),[
				'gallery_name' => 'required|min:3',
			]);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}


		$subject = Subjects::where('name', $name)->first();
		$gallery = new Gallery;
		$gallery->subject_id = $subject->id;
		$gallery->name = $request->input('gallery_name');
		$gallery->created_by=Auth::user()->id;
		$gallery->published= 1;
		$gallery->save();
		if($request->get('image')){
		$image=Image::findOrFail($request->get('image'));
		$image->gallery_id = $gallery->id;
		$image->save();

		$currentGallery = Gallery::findOrFail(0);
		$images = $currentGallery->imagess();

		foreach ($currentGallery->imagess as $image) {
			unlink(public_path($image->file_path));
		}
		$images->delete();
		}


		return redirect('teacher/'.$name.'/upvideo/list')->with('gallery',$gallery);
	}
		public function updateGalleryList(Request $request,$name,$id){
			
			$validator = Validator::make($request->all(),[
				'gallery_name' => 'required|min:3',
			]);
			if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
			}

			if($request->get('image')){
			$gallery=Gallery::findOrFail($id);
			$image=Image::findOrFail($request->get('oldimage'));
			unlink(public_path($image->file_path));
			$image->delete();
			$gallery->name = $request->get('gallery_name');
			$gallery->save();
			

			$image=Image::findOrFail($request->get('image'));
			$image->gallery_id = $id;
			$image->save();

			
			$currentGallery = Gallery::findOrFail(0);
			$images = $currentGallery->imagess();

			foreach ($currentGallery->imagess as $image) {
			unlink(public_path($image->file_path));
			}
			$images->delete();
			}
			else{
				$gallery=Gallery::findOrFail($id);
				$gallery->name = $request->get('gallery_name');
				$gallery->save();
			}
		return redirect('teacher/'.$name.'/upvideo/list')->with('gallery',$gallery);
	}
	public function viewGalleryPics($name,$id){
		$gallery = Gallery::findOrFail($id);
		return view('teacher.upvideo.update')->with('gallery',$gallery)->with('name',$name);
		
	}
	public function doImageUpload(Request $request){
		

		$file = $request->file('file');
		$filename = uniqid() . $file->getClientOriginalName();
		$file->move('gallery/images',$filename);

		$image = Image::create([
				'file_name'  => $filename,
				'file_size'  => $file->getClientSize(),
				'file_mime'	 => $file->getClientMimeType(),
				'file_path'	 =>	'gallery/images/' .$filename,
				'created_by' =>  Auth::user()->id,
			]);
		return $image;
	}
	public function deleteGallery($id){
		$currentGallery = Gallery::findOrFail($id);
		if($currentGallery->created_by != Auth::user()->id){
			abort('404','You are not allowed to delete this gallery');
		}
		$images = $currentGallery->imagess();

		foreach ($currentGallery->imagess as $image) {
			unlink(public_path($image->file_path));
		}
		$images->delete();
		$currentGallery->delete();

		return redirect()->back();
	}
}