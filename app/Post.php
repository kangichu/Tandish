<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Laravelista\Comments\Commentable;

class Post extends Model
{

    use Commentable;
    
    // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function cookbooks(){
        return $this->belongsToMany('App\Cookbook');
    }

    public function bookmarks(){
        return $this->belongsToMany('App\Bookmark');
    }

     public function mades(){
        return $this->belongsToMany('App\Made');
    }

}