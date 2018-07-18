<?php

namespace App\Http\Controllers\Site;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //

    public function getIndex($slug)
    {
        $category = Category::where('slug' , $slug)->first();

        return view('site.pages.categories.index' ,compact('category'));
    }
}
