<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CompanyProfile;
use App\Http\Requests\CompanyProfileRequest;

class CompanyProfileController extends Controller
{
    //

    public function getIndex(){
        $profile = CompanyProfile::first();

        return view('admin.pages.about.company-profile' ,compact('profile'));
    }

    public function postIndex(CompanyProfileRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Company profile section has been updated successfully'];
    }
}
