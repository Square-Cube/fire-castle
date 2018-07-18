<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    //
    public function getIndex(){
        $projects = Project::get();
        $locations = Location::get();

        return view('admin.pages.projects.index' ,compact('projects' ,'locations'));
    }

    public function getEdit($id){
        $project = Project::find($id);
        $locations = Location::get();

        return view('admin.pages.projects.edit' ,compact('project' ,'locations'));
    }

    public function postIndex(ProjectRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Project has been stored successfully'];
    }

    public function postEdit(ProjectRequest $request , $id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Project has been updated successfully'];
    }

    public function getDelete($id){
        $project = Project::find($id);

        $destination = storage_path('uploads/projects');

        foreach ($project->images as $image){
            @unlink($destination . "/{$image->image}");
            $image->delete();
        }

        @unlink($destination . "/{$project->image}");
        $project->details()->delete();
        $project->delete();

        return redirect()->back();
    }
}
