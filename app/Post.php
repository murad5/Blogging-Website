<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [
        'user_id', 'title', 'content','published_at','category','image'
    ];
     function user() {
    	return $this->belongsTo('App\User');
    }
    function comments(){
    	return $this->hasMany('App\Comment');
    }
}
