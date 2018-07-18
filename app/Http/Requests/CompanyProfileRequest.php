<?php

namespace App\Http\Requests;

use App\CompanyProfile;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class CompanyProfileRequest extends FormRequest
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
        $result = ['status' => 'error' ,'data' => implode(PHP_EOL , $validator->errors()->all())];

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
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
            'ar_title' => 'required',
            'en_title' => 'required',
            'ar_description' => 'required',
            'en_description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'Please enter image',
            'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
            'image.max' => ' Image size should be less than 2MB',
            'ar_title.required' => 'Please enter title in arabic',
            'en_title.required' => 'Please enter title in english',
            'ar_description.required' => 'Please enter content in arabic',
            'en_description.required' => 'Please enter content in english'
        ];
    }

    public function store(){
//        dd($this->all());
        $profile = CompanyProfile::first();

        $file = $this->image;
        $destination = 'assets/site/images';

        if (!empty($file)) {
            @unlink($destination . "/{$profile->image}");
            $profile->image = 'company-profile.png';
//            $profile->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $profile->image);
            Image::make($destination.'/'.$profile->image)->resize(1540 ,400)->save($destination.'/'.$profile->image);
        }

        $profile->save();

        $profile->arabic()->update([
            'title' => $this->ar_title,
            'description' => $this->ar_description
        ]);

        $profile->english()->update([
            'title' => $this->en_title,
            'description' => $this->en_description
        ]);

    }

}
