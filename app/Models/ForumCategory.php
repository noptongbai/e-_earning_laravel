<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model{
    protected $table = 'forum_categories';
    
    public function group(){
        
    	return $this->belongsTo('App\Models\ForumGroup');
    }
    public function threads(){
        return $this->hasMany('App\Models\ForumThread','category_id');
    }
    public function comments(){
        return $this->hasMany('App\Models\ForumComment','group_id');
    }
}
