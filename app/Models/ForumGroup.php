<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ForumGroup extends Model{
    protected $table = 'forum_groups';
  
    public function categories(){
    	return $this->hasMany('App\Models\ForumCategory','group_id');
    }
    public function threads(){
    	return $this->hasMany('App\Models\ForumThread','group_id');
    }
    public function comments(){
    	return $this->hasMany('App\Models\ForumComment','group_id');
    }
}
