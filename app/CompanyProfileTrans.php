<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfileTrans extends Model
{
    //
    protected $fillable = ['description','title','lang'];

    public function profile(){
        return $this->belongsTo('App\CompanyProfile' ,'profile_id');
    }
}
