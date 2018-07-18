<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PartnerRequest;
use App\Partner;

class PartnerController extends Controller
{
    //

    public function getIndex(){
        $partners = Partner::get();

        return view('admin.pages.partners.index' ,compact('partners'));
    }

    public function postIndex(PartnerRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Partner logo has been added successfully'];
    }

    public function postEdit(PartnerRequest $request ,$id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Partner logo has been updated successfully'];
    }

    public function getDelete($id)
    {
        $partner = Partner::find($id);

        $destination = storage_path('uploads/partners');
        @unlink($destination . "/{$partner->image}");

        $partner->delete();

        return redirect()->back();
    }
}
