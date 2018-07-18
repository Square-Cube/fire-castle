<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLinkTrans extends Model
{
    //
    protected $fillable = ['title' ,'lang'];

    public function social(){
        return $this->belongsTo('App\SocialLink' ,'social_id');
    }
}
