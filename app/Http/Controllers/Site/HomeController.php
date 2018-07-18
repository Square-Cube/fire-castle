<?php

namespace App\Http\Controllers\Site;

use App\HomeSection;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;

class HomeController extends Controller
{
    //
    public function getIndex(){
        $section = HomeSection::first();
        $products = Product::where('in_home' ,'1')->take(3)->orderBy('created_at' ,'ASC')->get();
        $partners = Partner::get();

        return view('site.pages.index' ,compact('section' ,'products' ,'partners'));
    }

    public function postSubscriber(SubscriberRequest $request){
        $request->store();

        return ['response' => 'success' ,
            'message' => app()->getLocale() == 'en' ? 'Someone from our customer service will contact you shortly' :
                'احد مسئولي خدمة العملاء سيقوم بالاتصال بك قريبا'];
    }
}