<?php namespace App\Http\Controllers\Admins;
use App\Http\Controllers\AdminsController;
use App\Ads;
use Illuminate\Http\Request;



class AdsController extends AdminsController {

public function NewAds()
    {
         $ads = Ads::find(1);
        return view('admin.ads.index')->with('ads',$ads);;
    
    
    }

    public function storeAds(Request $request){
        
            
            $thread = Ads::find(1)->first();
            $thread->title = $request->get('title');
            $thread->body  = $request->get('body');
            if($thread->save()){
                return redirect()->to('admin/index')->with('success',"Your thread has been saved");

            }
            else{
                return redirect()->to('admin/new')->with('fail',"Your thread error")->withInput();
            }
        }    

    }