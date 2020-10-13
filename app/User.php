<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Followable;
use Laravelista\Comments\Commenter;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Followable, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function cookbooks(){
        return $this->hasMany('App\Cookbook');
    }

    public function bookmarks(){
        //return $this->hasMany('App\Bookmark');
        return $this->belongsToMany(Post::class, 'bookmarks', 'user_id', 'post_id')->withTimeStamps();
    }

    public function mades(){
        return $this->hasMany('App\Made');
    }

    public function profile(){
        return $this->hasOne('App\Profile');
    }

}
