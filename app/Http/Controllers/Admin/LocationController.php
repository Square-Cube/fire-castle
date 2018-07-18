<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LocationRequest;
use App\Location;

class LocationController extends Controller
{
    //
    public function getIndex(){
        $locations = Location::orderBy('id' , 'DESC')->get();

        return view('admin.pages.locations.index' ,compact('locations'));
    }

    public function postIndex(LocationRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Location data has been added successfully'];
    }

    public function postEdit(LocationRequest $request , $id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Location data has been updated successfully'];
    }

    public function getDelete($id){
        $location = Location::find($id);
        $destination = storage_path('uploads/projects');
        foreach ($location->projects as $project){
            foreach ($project->images as $image){
                @unlink($destination . "/{$image->image}");
                $image->delete();
            }

            @unlink($destination . "/{$project->image}");
            $project->details()->delete();
            $project->delete();
        }

        $location->details()->delete();
        $location->delete();

        return redirect()->back();
    }
}
