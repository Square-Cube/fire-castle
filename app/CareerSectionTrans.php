<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareerSectionTrans extends Model
{
    //
    protected $fillable = ['title','description' ,'lang'];

    public function section(){
        return $this->belongsTo('App\CareerSection' ,'section_id');
    }
}
