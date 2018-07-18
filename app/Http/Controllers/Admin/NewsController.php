<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\News;

class NewsController extends Controller
{
    //
    public function getIndex(){
        $news = News::get();

        return view('admin.pages.news.index' ,compact('news'));
    }

    public function getEdit($id){
        $news = News::find($id);

        return view('admin.pages.news.edit' ,compact('news'));
    }

    public function postIndex(NewsRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'News has been added successfully'];
    }

    public function postEdit(NewsRequest $request , $id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'News has been updated successfully'];
    }

    public function getDelete($id){
        $news = News::find($id);

        $destination = storage_path('uploads/news');
        @unlink($destination."/.{$news->image}");

        $news->details()->delete();
        $news->delete();

        return redirect()->back();
    }
}
