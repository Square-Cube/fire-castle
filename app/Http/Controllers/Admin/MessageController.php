<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    //
    public function getIndex(){
        $messages = Message::get();

        return view('admin.pages.messages.index' ,compact('messages'));
    }

    public function getDelete($id){
        $message = Message::find($id);

        $message->delete();

        return redirect()->back();
    }
}
