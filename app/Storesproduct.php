<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storesproduct extends Model
{
    //
    protected $fillable = [
        'CategoryName',
        'ProductName',
        'Units',
        'QuantityInStock',
        'Threshold',
        'EstimatedPrice',
        'Location',
        'UpdatedBy',
    ];

     //A Product belongs to a Category
     public function storescategory(){
        return $this->belongsTo('App\User');
    }
}
