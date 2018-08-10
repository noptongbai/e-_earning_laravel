<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    //	
    protected $table ='subjects';
  	public $timestamps=false;
  
  	public function users()
    {
        return $this->belongsToMany('App\Models\Users');
    }
}
