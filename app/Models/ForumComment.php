<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ForumComment extends Model{
    protected $table = 'forum_comments';
    
     public function group(){
        return $this->belongsTo('App\Models\ForumGroup');
    }
    public function category(){
    	return $this->belongsTo('App\Models\ForumCategory');
    }
     public function thread(){
    	return $this->belongsTo('App\Models\ForumThread');
    }
    public function author()
    {
          return $this->belongsTo('App\Models\Users', 'author_id');
    }
}
