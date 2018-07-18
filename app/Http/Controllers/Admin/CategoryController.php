<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //
    public function getIndex(){
        $categories = Category::orderBy('parent_id' ,'ASC')->get();

        return view('admin.pages.categories.index' ,compact('categories'));
    }

    public function getEdit($id){
        $category = Category::find($id);
        $categories = Category::get();

        return view('admin.pages.categories.edit' ,compact('category','categories'));
    }

    public function postIndex(CategoryRequest $request){
        $request->store();

        return ['status' => 'success' ,'data' => 'Category data has been stored successfully'];
    }

    public function postEdit(CategoryRequest $request , $id){
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'Category data has been updated successfully'];
    }

    public function getDelete($id){
        $category = Category::find($id);

        $destination = storage_path('uploads/categories');
        @unlink($destination . "/{$category->image}");

        foreach ($category->products as $product) {
            $destination = storage_path('uploads/products');
            @unlink($destination . "/{$product->image}");
            $product->details()->delete();
            $product->delete();
        }

        $category->details()->delete();
        $category->delete();

        return redirect()->back();
    }
}
