<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTrans extends Model
{
    //
    protected $fillable = ['description','name','lang'];

    public function project(){
        return $this->belongsTo('App\Project' ,'project_id');
    }
}
