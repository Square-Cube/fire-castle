<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    //
    public function getIndex(){
        $subscribers = Subscriber::get();

        return view('admin.pages.subscribers.index' ,compact('subscribers'));
    }

    public function getDelete($id){
        $subscriber = Subscriber::find($id);

        $subscriber->delete();

        return redirect()->back();
    }
}
