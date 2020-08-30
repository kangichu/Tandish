<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cookbook extends Model
{
	use Notifiable;
	
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
