<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    //
    protected $fillable = ['image'];

    public function project(){
        return $this->belongsTo('App\Project' ,'project_id');
    }
}
