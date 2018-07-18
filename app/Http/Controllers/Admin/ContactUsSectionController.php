<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactUsSection;
use App\Http\Requests\ContactUsSectionRequest;
use App\Http\Requests\MapRequest;
use App\Setting;

class ContactUsSectionController extends Controller
{
    //
    public function getIndex(){
        $sections = ContactUsSection::all();

        return view('admin.pages.contact-us.section',compact('sections'));
    }

    public function getEdit($id){
        $section = ContactUsSection::find($id);

        return view('admin.pages.contact-us.edit',compact('section'));
    }

    public function postIndex(ContactUsSectionRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Contact us section has been added successfully'];
    }

    public function postEdit(ContactUsSectionRequest $request ,$id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Contact us section has been updated successfully'];
    }

    public function getDelete($id)
    {
        $contact = ContactUsSection::find($id);

        $contact->details()->delete();
        $contact->delete();

        return redirect()->back();
    }
    
    public function postEditMap(MapRequest $request)
    {
        $request->edit();
        
        return ['status' => 'success' ,'data' => 'Site map has been updated successfully'];
    }
}
