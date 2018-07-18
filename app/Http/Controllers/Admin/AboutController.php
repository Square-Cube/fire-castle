<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    //
    public function getIndex(){
        $about = About::first();

        return view('admin.pages.about.about' ,compact('about'));
    }

    public function postIndex(AboutRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Vision ,Mission and policy have been updated successfully'];
    }
}
