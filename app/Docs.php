<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    
    protected $table ='docs';

    public function content(){
    	return $this->hasOne('App\Content');
    }
    public function contents(){
    	return $this->hasMany('App\Content');
    }
}
