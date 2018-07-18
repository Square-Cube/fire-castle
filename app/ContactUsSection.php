<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsSection extends Model
{
    //
    public function details(){
        return $this->hasMany('App\ContactUsTransSection' ,'section_id');
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
