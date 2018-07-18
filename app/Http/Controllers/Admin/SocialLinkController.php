<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SocialLink;
use Illuminate\Http\Request;
use App\Http\Requests\SocialLinkRequest;

class SocialLinkController extends Controller
{
    //
    public function getIndex()
    {
        $links = SocialLink::all();

        return view('admin.pages.social-links.index' ,compact('links'));
    }

    public function postIndex(SocialLinkRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'Social link has been added successfully'];
    }

    public function postEdit(SocialLinkRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Social link has been updated successfully'];
    }

    public function getDelete($id)
    {
        $link = SocialLink::find($id);

        $link->details()->delete();
        $link->delete();

        return redirect()->back();
    }
}
