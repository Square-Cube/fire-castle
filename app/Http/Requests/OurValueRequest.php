<?php

namespace App\Http\Requests;

use App\OurValue;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;


class OurValueRequest extends FormRequest
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
        if(\Request::route()->getName() == 'admin.our-values') {
            return [
                'ar_title' => 'required',
                'en_title' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'ar_description' => 'required',
                'en_description' => 'required'
            ];
        }else{
            return [
                'ar_title' => 'required',
                'en_title' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'ar_description' => 'required',
                'en_description' => 'required'
            ];
        }
    }

    public function messages()
    {
        if(\Request::route()->getName() == 'admin.our-values') {
            return [
                'ar_title.required' => 'Please enter title in arabic',
                'en_title.required' => 'Please enter title in english',
                'image.required' => 'You must upload an image',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'ar_description.required' => 'Please enter description in arabic',
                'en_description.required' => 'Please enter description in english'
            ];
        }else{
            return [
                'ar_title.required' => 'Please enter title in arabic',
                'en_title.required' => 'Please enter title in english',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'ar_description.required' => 'Please enter description in arabic',
                'en_description.required' => 'Please enter description in english'
            ];
        }
    }

    public function store(){
        $news  = new OurValue();

        $file = $this->image;
        $destination = storage_path('uploads/ourValue');

        if (!empty($file)) {
//            @unlink($destination . "/{$event->image}");
            $news->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $news->image);
            Image::make($destination.'/'.$news->image)->resize(49,49)->save($destination.'/'.$news->image);
        }

        if ($news->save()){
            $news->details()->create([
                'title' => $this->ar_title,
                'description' => $this->ar_description,
                'lang' => 'ar'
            ]);

            $news->details()->create([
                'title' => $this->en_title,
                'description' => $this->en_description,
                'lang' => 'en'
            ]);
        }
    }

    public function edit($id){
        $news = OurValue::find($id);

        $file = $this->image;
        $destination = storage_path('uploads/ourValue');

        if (!empty($file)) {
            @unlink($destination . "/{$news->image}");
            $news->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $news->image);
            Image::make($destination.'/'.$news->image)->resize(49,49)->save($destination.'/'.$news->image);
        }

        $news->save();

        $news->arabic()->update([
            'title' => $this->ar_title,
            'description' => $this->ar_description,
            'lang' => 'ar'
        ]);

        $news->english()->update([
            'title' => $this->en_title,
            'description' => $this->en_description,
            'lang' => 'en'
        ]);

    }
}
