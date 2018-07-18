<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    //

    public function getIndex()
    {
        $banners = Banner::orderBy('id' , 'DESC')->get();

        return view('admin.pages.banners.index' ,compact('banners'));
    }

    public function postEdit(BannerRequest $request)
    {
        $request->edit();

        return ['status' => 'success' ,'data' => 'Banner has been updated successfully'];
    }
}