<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function details(){
        return $this->hasMany('App\CategoryTrans' ,'category_id');
    }

    public function translated(){
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }

    public function english(){
        return $this->details()->where('lang' ,'en')->first();
    }

    public function arabic(){
        return $this->details()->where('lang' ,'ar')->first();
    }

    public function category()
    {
        return $this->belongsTo('App\Category' ,'parent_id');
    }

    public function categories()
    {
        return $this->hasMany('App\Category' ,'parent_id');
    }

    public function products(){
        return $this->hasMany('App\Product' ,'category_id');
    }
}
