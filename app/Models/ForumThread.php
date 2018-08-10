<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model{
    protected $table = 'forum_threads';
     public function group(){
    	return $this->belongsTo('App\Models\ForumGroup');
    }
    public function category(){
    	return $this->belongsTo('App\Models\ForumCategory');
    }
    
    public function comments(){
        return $this->hasMany('App\Models\ForumComment','thread_id');
    }
    public function author()
    {
          return $this->belongsTo('App\Models\Users', 'author_id');
    }
}
