<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storescategory extends Model
{
    //
    protected $primaryKey = 'CategoryID';

    protected $fillable = [
        'CategoryName',
        'Notes',
        'UpdatedBy',
    ];

     //A Category has many Products
     public function storesproducts(){
        return $this->hasMany('App\Storesproduct');
    }
}
