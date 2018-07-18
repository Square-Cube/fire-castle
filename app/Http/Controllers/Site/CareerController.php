<?php

namespace App\Http\Controllers\Site;

use App\CareerSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerRequest;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    //
    public function getIndex(){
        $section = CareerSection::first();

        return view('site.pages.careers.index' ,compact('section'));
    }

    public function postIndex(CareerRequest $request){
        $request->store();

        return ['response' => 'success' ,
            'message' => app()->getLocale() == 'en' ? 'Someone from our customer service will contact you shortly' :
                'احد مسئولي خدمة العملاء سيقوم بالاتصال بك قريبا'];
    }
}
