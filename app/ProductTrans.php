<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTrans extends Model
{
    protected $fillable = ['description','specifications','features','name','lang'];

    public function product(){
        return $this->belongsTo('App\Product' ,'product_id');
    }
}
