<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HomeSectionRequest;
use App\HomeSection;

class HomeSectionController extends Controller
{
    //
    public function getIndex(){
        $section = HomeSection::first();

        return view('admin.pages.home.section' ,compact('section'));
    }

    public function postIndex(HomeSectionRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Home sections has been updated successfully'];
    }
}
