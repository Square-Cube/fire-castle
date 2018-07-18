<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProjectImage;
use App\Http\Requests\ProjectImageRequest;

class ProjectImageController extends Controller
{
    //
    public function getIndex($id){
        $images = ProjectImage::where('project_id' , $id)->get();

        return view('admin.pages.projects.images' ,compact('images' ,'id'));
    }

    public function postIndex(ProjectImageRequest $request ,$id){
        $request->store($id);

        return ['status' => 'success' ,'data' => 'Project image has been added successfully'];
    }
    public function postEdit(ProjectImageRequest $request , $id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Project image has been updated successfully'];
    }

    public function getDelete($id){
        $image = ProjectImage::find($id);

        $destination = storage_path('uploads/projects');
        @unlink($destination . "/{$image->image}");

        $image->delete();

        return redirect()->back();
    }
}
