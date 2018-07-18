<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function getIndex($id){
        $category = Category::where('slug' ,$id)->first();

        return view('site.pages.products.index' ,compact('category' ));
    }

    public function getSingle($id){
        $product = Product::where('slug' ,$id)->first();

        return view('site.pages.products.single' ,compact('product'));
    }
}
