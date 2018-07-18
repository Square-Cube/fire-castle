<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventsRequest;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function getIndex(){
        $events = Events::get();

        return view('admin.pages.events.index' ,compact('events'));
    }

    public function getEdit($id){
        $event = Events::find($id);

        return view('admin.pages.events.edit' ,compact('event'));
    }

    public function postIndex(EventsRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Event has been added successfully'];
    }

    public function postEdit(EventsRequest $request , $id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Event has been updated successfully'];
    }

    public function getDelete($id){
        $event = Events::find($id);

        $destination = storage_path('uploads/events');
        @unlink($destination."/.{$event->image}");

        $event->details()->delete();
        $event->delete();

        return redirect()->back();
    }
}
