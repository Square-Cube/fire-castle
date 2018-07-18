<?php

namespace App\Http\Controllers\Site;

use App\ContactUsSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Message;

class ContactController extends Controller
{
    //
    public function getIndex(){
        $sections = ContactUsSection::all();

        return view('site.pages.contact.index' ,compact('sections'));
    }

    public function postIndex(ContactRequest $request){
        $request->store();

        return ['response' => 'success' ,
            'message' => app()->getLocale() == 'en' ? 'Someone from our customer service will contact you shortly' :
                'احد مسئولي خدمة العملاء سيقوم بالاتصال بك قريبا'];
    }
}
