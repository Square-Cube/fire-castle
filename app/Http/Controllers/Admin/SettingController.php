<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use Image;

class SettingController extends Controller
{
    //view the settings page
    public function getIndex()
    {
        $settings = Setting::first();

        return view('admin.pages.settings.index' ,compact('settings'));
    }

    //edit the settings of the site
    public function postIndex(Request $request)
    {
        $v = validator($request->all() ,[
            'site_name' => 'required',
            'site_logo' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
            'email' => 'required',
            'slogan' => 'required',
            'ar_site_name' => 'required',
            'ar_slogan' => 'required',
        ] ,[
            'site_name.required' => 'Please enter site name in english',
            'site_logo.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
            'site_logo.max' => ' Image size should be less than 2MB',
            'email.required' => 'Please enter site email for communication',
            'slogan.required' => 'Please enter company slogan in english',
            'ar_site_name.required' => 'Please enter site name in arabic',
            'ar_slogan.required' => 'Please enter site name in arabic',
        ]);

        if ($v->fails()){
            return ['status' => false ,'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $settings = Setting::first();

        $settings->site_name = $request->site_name;
        $settings->ar_site_name = $request->ar_site_name;
        $settings->slogan = $request->slogan;
        $settings->ar_slogan = $request->ar_slogan;
        $settings->email = $request->email;

        $file = $request->site_logo;
        $destination = storage_path('uploads/logo');

        if (!empty($file)) {
            @unlink($destination . "/{$settings->site_logo}");
            $settings->site_logo= md5(time()).'.'.$file->getClientOriginalName();
            $request->site_logo->move($destination, $settings->site_logo);
            Image::make($destination.'/'.$settings->site_logo)->fit(158 ,85)->save($destination.'/'.$settings->site_logo);
        }

        if ($settings->save()){
            return ['status' => 'success' ,'data' => 'Site settings has been updated successfully'];
        }

        return ['status' => 'false' ,'data' => 'Error please try again later'];
    }

    
}
