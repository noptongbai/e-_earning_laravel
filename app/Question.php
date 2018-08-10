<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //	
     protected $table ='question';
  	public $timestamps=false;

  	public function answers(){
    	return $this->hasMany('App\Answer');
    }
  	public function test(){
     	return $this->belongsTo('App\Test');
     }
}
