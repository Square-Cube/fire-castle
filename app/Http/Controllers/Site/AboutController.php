<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\CeoMessage;
use App\CompanyProfile;
use App\Http\Controllers\Controller;
use App\OurValue;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function getIndex(){
        $message = CeoMessage::first();
        $profile = CompanyProfile::first();
        $about = About::first();
        $ourValues = OurValue::get();

        return view('site.pages.about.index' ,compact('message' ,'profile' ,'about' ,'ourValues'));
    }
}
