<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Image;

class ProfileController extends Controller
{
    //
    public function getIndex() {
        $user = User::where('id', auth()->guard('admins')->user()->id)->first();

        return view('admin.pages.profile.index', compact('user'));
    }

    public function postIndex(Request $request) {
        $v = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->guard('admins')->id(),
            'username' => 'required|unique:users,username,' . auth()->guard('admins')->id(),
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000'
                ], [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'email.unique' => 'This email is already taken',
            'username.required' => 'Please enter your username',
            'username.unique' => 'This username is already taken',
            'image.requried' => 'Please enter user image',
            'image.mimes' => 'Image type should be one of these : jpeg,jpg,png,gif',
            'image.max' => 'Image size should be less than 2MB',
        ]);

        if ($v->fails()) {
            return ['status' => false, 'data' => implode(PHP_EOL, $v->errors()->all())];
        }

        $user = User::find(auth()->guard('admins')->user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $destination = storage_path('uploads/users');
//        dd($request->logo);
        if ($request->image) {
            @unlink($destination . "/{$user->image}");
            $user->image = md5(time()).'.'.$request->image->getClientOriginalName();
            $request->image->move($destination, $user->image);
            Image::make($destination.'/'.$user->image)->resize(30 ,30)->save($destination.'/'.$user->image);
        }

        if ($user->save()) {
            return ['status' => 'success', 'data' => 'Profile has been updated successfully'];
        }
        return ['status' => false, 'data' => 'Error , please try again later'];
    }

}
