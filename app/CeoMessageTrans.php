<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CeoMessageTrans extends Model
{
    //
    protected $fillable = ['description','title' ,'name' ,'job','lang'];

    public function message(){
        return $this->belongsTo('App\CeoMessage' ,'message_id');
    }
}
