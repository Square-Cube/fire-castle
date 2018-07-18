<?php

namespace App\Http\Requests;

use App\HomeSection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class HomeSectionRequest extends FormRequest
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
            'ar_title1' => 'required',
            'en_title1' => 'required',
            'ar_title2' => 'required',
            'en_title2' => 'required',
            'ar_title3' => 'required',
            'en_title3' => 'required',
            'ar_title4' => 'required',
            'en_title4' => 'required',
            'ar_title5' => 'required',
            'en_title5' => 'required',
            'ar_description' => 'required',
            'en_description' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
            'profile' => 'mimes:pdf',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ar_title1.required' => 'Please enter banner first title in arabic',
            'en_title1.required' => 'Please enter banner first title in english',
            'ar_title2.required' => 'Please enter banner second title in arabic',
            'en_title2.required' => 'Please enter banner second title in english',
            'ar_title3.required' => 'Please enter second section title in arabic',
            'en_title3.required' => 'Please enter second section title in english',
            'ar_description.required' => 'Please enter second section description in arabic',
            'en_description.required' => 'Please enter second section description in english',
            'ar_title4.required' => 'Please enter third section title in arabic',
            'en_title4.required' => 'Please enter third section title in english',
            'ar_title5.required' => 'Please enter third section call now in arabic',
            'en_title5.required' => 'Please enter third section call now in english',
            'phone.required' => 'Please enter call now phone number',
            'image.image' => 'Please enter banner',
            'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
            'image.max' => ' Image size should be less than 2MB',
            'profile.mimes' => 'file type should be : .pdf'
        ];
    }

    public function store(){
        $section = HomeSection::first();

        $file = $this->image;
        $destination = 'assets/site/images';

        if (!empty($file)) {
            @unlink($destination . "/{$section->banner}");
            $section->banner = 'bc.jpg';
            $this->image->move($destination, $section->banner);
            Image::make($destination.'/'.$section->banner)->resize(1920,530)->save($destination.'/'.$section->banner);
        }

        $file1 = $this->profile;
        $destination1 = storage_path('uploads/logo');

        if (!empty($file1)) {
            @unlink($destination1 . "/{$section->profile}");
            $section->profile = md5(time()).'.'.$file1->getClientOriginalName();
            $this->profile->move($destination1, $section->profile);
        }

        $section->phone = $this->phone;

        $section->save();

        $section->arabic()->update([
            'title1' => $this->ar_title1,
            'title2' => $this->ar_title2,
            'title3' => $this->ar_title3,
            'title4' => $this->ar_title4,
            'title5' => $this->ar_title5,
            'description' => $this->ar_description
        ]);

        $section->english()->update([
            'title1' => $this->en_title1,
            'title2' => $this->en_title2,
            'title3' => $this->en_title3,
            'title4' => $this->en_title4,
            'title5' => $this->en_title5,
            'description' => $this->en_description
        ]);
    }
}
