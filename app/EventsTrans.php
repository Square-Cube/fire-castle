<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventsTrans extends Model
{
    //
    protected $fillable = ['name','description' ,'lang'];

    public function event(){
        return $this->belongsTo('App\Events' ,'event_id');
    }
}
