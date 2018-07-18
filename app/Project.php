<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function details(){
        return $this->hasMany('App\ProjectTrans' ,'project_id');
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

    public function location(){
        return $this->belongsTo('App\Location' ,'location_id');
    }

    public function images(){
        return $this->hasMany('App\ProjectImage' ,'project_id');
    }
}
