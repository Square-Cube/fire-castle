<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function getIndex(){
        $news = News::get();

        return view('site.pages.news.index' ,compact('news'));
    }

    public function getSingle($slug){
        $news  = News::where('slug' ,$slug)->first();

        return view('site.pages.news.single' ,compact('news'));
    }
}
