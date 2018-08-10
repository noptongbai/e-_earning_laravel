<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
| Example
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/
// Offline Login Page

Route::controller('login','Admins\LoginController');


// Start Online Page
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admins'],function(){
	
	Route::controller('index','BlankController');
	Route::controller('user','UserController');
	Route::controller('admin','Manage1Controller');
	Route::controller('student','Manage2Controller');
	Route::controller('teacher','Manage3Controller');
	Route::controller('course','CourseController');
 	Route::controller('upload','UploadController'); 
 	Route::get('/delete/{id}','UploadController@getDelete');
 	Route::match(['get', 'post'],'/new/multiple','OtherController@index');
 	Route::post('/new/multiple/save','OtherController@save');
 	Route::get('/delete/{id1}/{id2}','OtherController@delete');
	Route::post('ads/create',['uses'=>'AdsController@StoreAds']);
	Route::get('ads/new',['uses'=>'AdsController@NewAds']);
   
    
	
});




Route::group(['prefix'=>'teacher','middleware'=>'auth','namespace'=>'Teachers'],function(){
	

	Route::controller('index','Blank2Controller');
	Route::controller('user','User3Controller');


	
	Route::get('{name?}/test','AlltestController@index');
	Route::get('{name?}/createtest','CreatetestController@index');
	Route::post('{name?}/createtest/detail','CreatetestController@create');
	Route::post('{name?}/createtest/savedetail','CreatetestController@createdetail');
	Route::get('test/delete/{id}','CreatetestController@deletetest');
	Route::get('{name?}/edit/{id}','CreatetestController@edit');
	Route::post('{name?}/edit/detail/{id}','CreatetestController@editdetail');
	Route::post('{name?}/edit/savedetail/{id}','CreatetestController@editsavedetail');
	Route::get('{name?}/delete/{id}','CreatetestController@deleteQuestion');
	

	Route::get('{name?}/result/{id}','ResultController@index');
	Route::get('{name?}/result/delete/{id}','ResultController@delete');
	Route::get('{name?}/result/data/{id}','ResultController@data');
	Route::post('{name?}/result/data/save/{id}','ResultController@store');
	

	Route::get('{name?}/upvideo/list','UpvideoController@viewGalleryList');
	Route::post('{name?}/upvideo/save/','UpvideoController@saveGalleryList');
	Route::post('{name?}/upvideo/update/{id}','UpvideoController@updateGalleryList');
	Route::get('{name?}/upvideo/view/{id}','UpvideoController@viewGalleryPics');
	Route::get('{name?}/upvideo/add','UpvideoController@newGalleryPics');
	Route::post('video/do-upload','UpvideoController@doImageUpload');
	Route::get('video/upvideo/delete/{id}','UpvideoController@deleteGallery');


	Route::get('{name?}/updocs/list','UpdocsController@viewGalleryList');
	Route::post('{name?}/updocs/save','UpdocsController@saveGalleryList');
	Route::post('{name?}/updocs/update/{id}','UpdocsController@updateGalleryList');
	Route::get('{name?}/updocs/add','UpdocsController@newGalleryPics');
	Route::get('{name?}/updocs/view/{id}','UpdocsController@viewGalleryPics');
	Route::post('docs/do-upload','UpdocsController@doImageUpload');
	Route::get('docs/updocs/delete/{id}','UpdocsController@deleteGallery');




	 Route::group(['prefix'=>'{name?}/forum'],function(){
	 	Route::get('/',['uses'=>'ForumController@index','as'=>'forum-home']);
	 	Route::get('/category/{id}',['uses'=>'ForumController@category','as'=>'forum-category']);
	 	Route::get('/thread/{id}',['uses'=>'ForumController@thread','as'=>'forum-thread']);
	 	Route::get('/category/{id}/delete',['uses'=>'ForumController@deleteCategory','as'=>'forum-delete-category']);
		Route::get('/thread/{id}/new',['uses'=>'ForumController@newThread','as'=>'forum-get-new-thread']);	 	
		Route::get('/thread/{id}/delete',['uses'=>'ForumController@deleteThread','as'=>'forum-delete-thread']);
		Route::post('/thread/{id}/new',['uses'=>'ForumController@storeThread','as'=>'forum-store-thread']);	 	
		Route::post('/category/{id}/new',['uses'=>'ForumController@storeCategory','as'=>'forum-store-category']);
	 	Route::post('/comment/{id}/new',['uses'=>'ForumController@storeComment','as'=>'forum-store-comment']);
	 	Route::get('/comment/{id}/delete',['uses'=>'ForumController@deleteComment','as'=>'forum-delete-comment']);
	 });
});

	Route::group(['prefix'=>'student','middleware'=>'auth','namespace'=>'Students'],function(){
	Route::controller('index','Blank3Controller');
	Route::controller('user','User2Controller');
	Route::controller('{name?}/video','VideoController');
	Route::controller('{name?}/docs','DocController');
  

    Route::get('{name?}/showtest','ShowtestController@index');
    Route::get('{name?}/showtest/{id}','ShowtestController@show');
    Route::post('{name?}/showtest/{id}/result','ShowtestController@store');
    Route::post('upload/subjective/{id}','ShowtestController@upload');
     Route::get('delete/subjective/{id}','ShowtestController@getDelete');
   
   

    Route::group(['prefix'=>'{name?}/forum'],function(){
	 	Route::get('/',['uses'=>'Forum2Controller@index','as'=>'forum-home']);
	 	Route::get('/category/{id}',['uses'=>'Forum2Controller@category','as'=>'forum-category']);
	 	Route::get('/thread/{id}',['uses'=>'Forum2Controller@thread','as'=>'forum-thread']);
		Route::get('/thread/{id}/new',['uses'=>'Forum2Controller@newThread','as'=>'forum-get-new-thread']);	 	
		Route::get('/thread/{id}/delete',['uses'=>'Forum2Controller@deleteThread','as'=>'forum-delete-thread']);
		Route::post('/thread/{id}/new',['uses'=>'Forum2Controller@storeThread','as'=>'forum-store-thread']);	 	
	 	Route::post('/comment/{id}/new',['uses'=>'Forum2Controller@storeComment','as'=>'forum-store-comment']);
	 	Route::get('/comment/{id}/delete',['uses'=>'Forum2Controller@deleteComment','as'=>'forum-delete-comment']);
	 });
    

});
		 Route::get('/upload', 'ImageController@getUploadForm');
	
	Route::get('blank',function(){
		echo 'Get Blank Page';
	});




    











 	