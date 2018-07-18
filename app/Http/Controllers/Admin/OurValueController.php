<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OurValue;
use App\Http\Requests\OurValueRequest;

class OurValueController extends Controller
{
    //
    public function getIndex(){
        $ourValues  = OurValue::get();

        return view('admin.pages.about.values.index' ,compact('ourValues'));
    }

    public function getEdit($id){
        $ourValue = OurValue::find($id);

        return view('admin.pages.about.values.edit' ,compact('ourValue'));
    }

    public function postIndex(OurValueRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Value has been added successfully'];
    }

    public function postEdit(OurValueRequest $request ,$id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Value has been updated successfully'];
    }

    public function getDelete($id){
        $ourValue = OurValue::find($id);

        $destination = storage_path('uploads/ourValue');
        @unlink($destination . "/{$ourValue->image}");

        $ourValue->details()->delete();
        $ourValue->delete();

        return redirect()->back();
    }
}
