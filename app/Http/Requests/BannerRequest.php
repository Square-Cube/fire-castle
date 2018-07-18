<?php

namespace App\Http\Requests;

use App\Banner;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class BannerRequest extends FormRequest
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
        return [
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000'
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'Please enter image',
            'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
            'image.max' => ' Image size should be less than 2MB'
        ];
    }

    public function edit()
    {
        $banner = Banner::find($this->id);

        $file = $this->image;
        $destination = storage_path('uploads/banners');

        if (!empty($file)) {
            @unlink($destination . "/{$banner->image}");
            $banner->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $banner->image);
            Image::make($destination.'/'.$banner->image)->resize(1920 ,500)->save($destination.'/'.$banner->image);
        }

        $banner->save();
    }
}
