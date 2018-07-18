<?php

namespace App\Http\Controllers\Site;

use App\Events;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function getIndex(){
        $events = Events::get();

        return view('site.pages.events.index' ,compact('events'));
    }

    public function getSingle($slug){
        $event = Events::where('slug' ,$slug)->first();

        return view('site.pages.events.single' ,compact('event'));
    }
}
