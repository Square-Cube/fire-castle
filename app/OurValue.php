<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurValue extends Model
{
    //
    public function details(){
        return $this->hasMany('App\OurValueTrans' ,'value_id');
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
}
