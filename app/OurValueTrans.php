<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurValueTrans extends Model
{
    //
    protected $fillable = ['title','description' ,'lang'];

    public function ourValue(){
        return $this->belongsTo('App\OurValue' ,'value_id');
    }
}
