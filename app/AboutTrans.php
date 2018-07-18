<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutTrans extends Model
{
    //
    protected $fillable = ['vision','mission' ,'policy' ,'lang'];

    public function about(){
        return $this->belongsTo('App\About' ,'about_id');
    }
}
