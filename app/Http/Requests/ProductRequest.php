<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ProductRequest extends FormRequest
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
        if(\Request::route()->getName() == 'admin.products') {
            return [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'banner' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'ar_name' => 'required',
                'en_name' => 'required',
                'ar_description' => 'required',
                'en_description' => 'required',
                'desc1' => 'required',
                'desc2' => 'required',
                'desc3' => 'required',
                'desc4' => 'required',
            ];
        }else{
            return [
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'banner' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'ar_name' => 'required',
                'en_name' => 'required',
                'ar_description' => 'required',
                'en_description' => 'required',
                'desc1' => 'required',
                'desc2' => 'required',
                'desc3' => 'required',
                'desc4' => 'required',
            ];
        }
    }

    public function messages()
    {
        if(\Request::route()->getName() == 'admin.products'){
            return [
                'image.required' => 'You must upload an image',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'banner.required' => 'You must upload an banner',
                'banner.image' => 'Please enter image',
                'banner.mimes' => 'banner type should be : jpeg,jpg,png,gif ' ,
                'banner.max' => ' banner size should be less than 2MB',
                'ar_name.required' => 'Please enter product name in arabic',
                'en_name.required' => 'Please enter product name in english',
                'ar_description.required' => 'Please enter product description in arabic',
                'en_description.required' => 'Please enter product description in english',
                'desc1.required' => 'Please enter product specification in arabic',
                'desc2.required' => 'Please enter product specification in english',
                'desc3.required' => 'Please enter product features in arabic',
                'desc4.required' => 'Please enter product features in english',
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
                'ar_description.required' => 'Please enter product description in arabic',
                'en_description.required' => 'Please enter product description in english',
                'desc1.required' => 'Please enter product specification in arabic',
                'desc2.required' => 'Please enter product specification in english',
                'desc3.required' => 'Please enter product features in arabic',
                'desc4.required' => 'Please enter product features in english',
            ];
        }
    }

    public function store($id){
        $product = new Product();

        $file = $this->image;
        $destination = storage_path('uploads/products');

        $product->in_home = $this->in_home;

        if (!empty($file)) {
//            @unlink($destination . "/{$event->image}");
            $product->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $product->image);
            Image::make($destination.'/'.$product->image)->resize(555 , 459)->save($destination.'/'.$product->image);
        }

        $file1 = $this->banner;
        if (!empty($file1)) {
//            @unlink($destination . "/{$event->image}");
            $product->banner = md5(time()).'.'.$file1->getClientOriginalName();
            $this->banner->move($destination, $product->banner);
            Image::make($destination.'/'.$product->banner)->resize(1920 , 500)->save($destination.'/'.$product->banner);
        }

        $product->category_id = $id;

        $product->slug = str_slug($this->en_name);

        if ($product->save()){
            $product->details()->create([
                'name' => $this->ar_name,
                'description' => $this->ar_description,
                'specifications' => $this->desc1,
                'features' => $this->desc3,
                'lang' => 'ar'
            ]);

            $product->details()->create([
                'name' => $this->en_name,
                'description' => $this->en_description,
                'specifications' => $this->desc2,
                'features' => $this->desc4,
                'lang' => 'en'
            ]);
        }
    }

    public function edit($id){
        $product = Product::find($id);

        $file = $this->image;
        $destination = storage_path('uploads/products');

        if (!empty($file)) {
            @unlink($destination . "/{$product->image}");
            $product->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $product->image);
            Image::make($destination.'/'.$product->image)->resize(555 , 459)->save($destination.'/'.$product->image);
        }

        $file1 = $this->banner;
        if (!empty($file1)) {
            @unlink($destination . "/{$product->banner}");
            $product->banner = md5(time()).'.'.$file1->getClientOriginalName();
            $this->banner->move($destination, $product->banner);
            Image::make($destination.'/'.$product->banner)->resize(1920 , 500)->save($destination.'/'.$product->banner);
        }

        $product->in_home = $this->in_home;

        $product->save();

        $product->arabic()->update([
            'name' => $this->ar_name,
            'description' => $this->ar_description,
            'specifications' => $this->desc1,
            'features' => $this->desc3
        ]);

        $product->english()->update([
            'name' => $this->en_name,
            'description' => $this->en_description,
            'specifications' => $this->desc2,
            'features' => $this->desc4
        ]);
    }
}
