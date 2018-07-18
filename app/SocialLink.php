<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    //
    public function details(){
        return $this->hasMany('App\SocialLinkTrans' ,'social_id');
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
