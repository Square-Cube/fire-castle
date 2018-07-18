<?php

namespace App\Http\Requests;

use App\Partner;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;


class PartnerRequest extends FormRequest
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
        if(\Request::route()->getName() == 'admin.partners') {
            return [
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000'
            ];
        }else{
            return [
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000'
            ];
        }
    }

    public function messages()
    {
        if(\Request::route()->getName() == 'admin.partners') {
            return [
                'image.required' => 'You must upload an image',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB'
            ];
        }else{
            return [
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB'
            ];
        }
    }

    public function store(){
        $partner = new Partner();

        $file = $this->image;
        $destination = storage_path('uploads/partners');

        if (!empty($file)) {
//            @unlink($destination . "/{$event->image}");
            $partner->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $partner->image);
            Image::make($destination.'/'.$partner->image)->resize(156,118)->save($destination.'/'.$partner->image);
        }

        $partner->save();
    }

    public function edit($id){
        $partner = Partner::find($id);

        $file = $this->image;
        $destination = storage_path('uploads/partners');

        if (!empty($file)) {
            @unlink($destination . "/{$partner->image}");
            $partner->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $partner->image);
            Image::make($destination.'/'.$partner->image)->resize(156,118)->save($destination.'/'.$partner->image);
        }

        $partner->save();
    }
}
