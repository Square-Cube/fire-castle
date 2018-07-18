<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationTrans extends Model
{
    //
    protected $fillable = ['name' ,'lang'];
    public function location(){
        return $this->belongsTo('App\Location' ,'location_id');
    }
}
