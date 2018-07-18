<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSectionTrans extends Model
{
    //
    protected $fillable = ['title1','title2','title3','title4','title5','description' ,'lang'];
    public function section(){
        return $this->belongsTo('App\HomeSection' ,'section_id');
    }
}
