<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{

    // masse assignment
    protected $fillable = ['cart'];

    // every order belongs to one user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
