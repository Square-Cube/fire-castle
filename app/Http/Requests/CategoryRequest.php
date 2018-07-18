<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => implode(PHP_EOL ,$validator->errors()->all())];
        throw new HttpResponseException(response()->json($result, 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(\Request::route()->getName() == 'admin.categories') {
            return [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'banner' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'ar_name' => 'required',
                'en_name' => 'required',
                'ar_description' => 'required',
                'en_description' => 'required'
            ];
        }else{
            return [
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'banner' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'ar_name' => 'required',
                'en_name' => 'required',
                'ar_description' => 'required',
                'en_description' => 'required'
            ];
        }
    }

    public function messages()
    {
        if(\Request::route()->getName() == 'admin.categories'){
            return [
                'image.required' => 'You must upload an image',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'banner.required' => 'You must upload an banner',
                'banner.image' => 'Please enter image',
                'banner.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'banner.max' => ' Image size should be less than 2MB',
                'ar_name.required' => 'Please enter categories name in arabic',
                'en_name.required' => 'Please enter categories name in english',
                'ar_description.required' => 'Please enter content in arabic',
                'en_description.required' => 'Please enter content in english'
            ];
        }else{
            return [
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'banner.image' => 'Please enter image',
                'banner.mimes' => 'banner type should be : jpeg,jpg,png,gif ' ,
                'banner.max' => ' banner size should be less than 2MB',
                'ar_name.required' => 'Please enter categories name in arabic',
                'en_name.required' => 'Please enter categories name in english',
                'ar_description.required' => 'Please enter content in arabic',
                'en_description.required' => 'Please enter content in english'
            ];
        }
    }

    public function store(){
        $category = new Category();

        $category->slug = str_slug($this->en_name);
        $category->parent_id = $this->parent_id;

        $file = $this->image;
        $destination = storage_path('uploads/categories');

        if (!empty($file)) {
//            @unlink($destination . "/{$event->image}");
            $category->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $category->image);
            Image::make($destination.'/'.$category->image)->resize(262 ,175)->save($destination.'/'.$category->image);
        }

        $file1 = $this->banner;
        if (!empty($file1)) {
//            @unlink($destination . "/{$event->image}");
            $category->banner = md5(time()).'.'.$file1->getClientOriginalName();
            $this->banner->move($destination, $category->banner);
            Image::make($destination.'/'.$category->banner)->resize(1920 ,500)->save($destination.'/'.$category->banner);
        }

        if ($category->save()){
            $category->details()->create([
                'name' => $this->en_name,
                'description' => $this->en_description,
                'lang' => 'en'
            ]);

            $category->details()->create([
                'name' => $this->ar_name,
                'description' => $this->ar_description,
                'lang' => 'ar'
            ]);
        }
    }

    public function edit($id){
        $category = Category::find($id);

        $category->parent_id = $this->parent_id;

        $file = $this->image;
        $destination = storage_path('uploads/categories');

        if (!empty($file)) {
            @unlink($destination . "/{$category->image}");
            $category->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $category->image);
            Image::make($destination.'/'.$category->image)->resize(262 ,175)->save($destination.'/'.$category->image);
        }

        $file1 = $this->banner;
        if (!empty($file1)) {
            @unlink($destination . "/{$category->banner}");
            $category->banner = md5(time()).'.'.$file1->getClientOriginalName();
            $this->banner->move($destination, $category->banner);
            Image::make($destination.'/'.$category->banner)->resize(1920 ,500)->save($destination.'/'.$category->banner);
        }

        $category->english()->update([
            'name' => $this->en_name,
            'description' => $this->en_description
        ]);

        $category->arabic()->update([
            'name' => $this->ar_name,
            'description' => $this->ar_description
        ]);

        $category->save();
    }
}
