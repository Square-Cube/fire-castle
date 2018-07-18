<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Career;

class CareerController extends Controller
{
    //
    public function getIndex(){
        $careers = Career::get();

        return view('admin.pages.careers.index' ,compact('careers'));
    }

    public function getDelete($id){
        $career = Career::find($id);

        $destination = storage_path('uploads/resume');
        @unlink($destination . "/{$career->resume}");
        
        $career->delete();

        return redirect()->back();
    }
}
