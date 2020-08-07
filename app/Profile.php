<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'about', 'picture' , 'tel' , 'email','user_id'
    ];

    // the profile belongsTo user (relation ==> one to one)
    public function user(){
        return $this->belongsTo('App\User');
    }
}
