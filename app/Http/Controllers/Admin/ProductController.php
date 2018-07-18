<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    //
    public function getIndex($id){
        $products = Product::where('category_id' ,$id)->get();

        return view('admin.pages.products.index' ,compact('products' ,'id'));
    }

    public function getEdit($id){
        $product = Product::find($id);

        return view('admin.pages.products.edit' ,compact('product'));
    }

    public function postIndex(ProductRequest $request ,$id){
        $request->store($id);

        return ['status' => 'success' ,'data' => 'product data has been stored successfully'];
    }

    public function postEdit(ProductRequest $request , $id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'product data has been updated successfully'];
    }

    public function getDelete($id){
        $product = Product::find($id);

        $destination = storage_path('uploads/products');
        @unlink($destination . "/{$product->image}");

        $product->details()->delete();
        $product->delete();

        return redirect()->back();
    }
}
