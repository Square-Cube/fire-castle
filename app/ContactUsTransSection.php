<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsTransSection extends Model
{
    //
    protected $fillable = ['branch' ,'address' ,'lang'];

    public function section(){
        return $this->belongsTo('App\ContactUsSection' ,'section_id');
    }
}
