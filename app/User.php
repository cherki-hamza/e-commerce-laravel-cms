<?php

namespace App;

use Faker\Provider\File;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Product;
use App\Order;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // every user has one profile (relation ==> one to one)
    public function profile(){
        return $this->hasOne('App\Profile');
    }

    // every user we have one or many products (relation one to many)
    public function products(){
        return $this->hasMany(Product::class);
    }

    // every user hase many orders
    public function orders(){
        return $this->hasMany('App\Order');
    }


    // get photo from site api
    public function getGravatar(){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://gravatar.com/avatar/$hash";
    }

    // get picture from database ==> from profile model
    public function getPicture(){
        return $this->profile->picture;
    }

    // check if user Profile has a picture in database ==> true : see the user profile has a picture | and false see the user dont have a picture in database
    public function hasPicture(){
        if ($this->profile->picture != null){
            return true;
        }else{
            return false;
        }
    }

    // verify user is admin
    public function isAdmin(){
        if($this->role === 'admin'){
            return true;
        }else{
            return false;
        }
    }

    // verify user is viewer
    public function isViewer(){
        if($this->role === 'viewer'){
            return true;
        }else{
            return false;
        }
    }

    // verify user is editor and writer
    public function isEditor(){
        if($this->role === 'editor'){
            return true;
        }else{
            return false;
        }
    }

}
