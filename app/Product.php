<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use  App\User;

class Product extends Model
{
    use SoftDeletes;
    // protect the data input
    protected $fillable = ['product_title','product_picture','product_desc','product_price','product_qt','product_total_price','user_id'];

    // the product belongsTo user (relation one to many)
    public function user(){
        return $this->belongsTo(User::class);
    }

    // function to calculate the total price of product (qt*price)
    public function Total_Price(){
        return ($this->product_price *  $this->product_qt);
    }

    // get the product picture
    public function getPicture(){
        return $this->product_picture;
    }

}
