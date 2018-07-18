<?php

namespace App\Http\Controllers\Admin;

use App\CareerSection;
use Illuminate\Http\Request;
use App\Http\Requests\CareerSectionRequest;
use App\Http\Controllers\Controller;

class CareerSectionController extends Controller
{
    //
    public function getIndex(){
        $section = CareerSection::first();

        return view('admin.pages.careers.section',compact('section'));
    }

    public function postIndex(CareerSectionRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Career section has been updated successfully'];
    }
}
