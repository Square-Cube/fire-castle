<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Location;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function getIndex(){
        $locations = Location::get();
        $projects = Project::get();

        return view('site.pages.projects.index' ,compact('locations' ,'projects'));
    }
}
