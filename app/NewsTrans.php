<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTrans extends Model
{
    //
    protected $fillable = ['name','description' ,'lang'];

    public function news(){
        return $this->belongsTo('App\News' ,'news_id');
    }
}
