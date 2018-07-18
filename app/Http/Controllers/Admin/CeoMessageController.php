<?php

namespace App\Http\Controllers\Admin;

use App\CeoMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CeoMessageRequest;

class CeoMessageController extends Controller
{
    //
    public function getIndex(){
        $message = CeoMessage::first();

        return view('admin.pages.about.message' ,compact('message'));
    }

    public function postIndex(CeoMessageRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'CEO message has been updated successfully'];
    }
}
