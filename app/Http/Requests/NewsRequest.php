<?php

namespace App\Http\Requests;

use App\News;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class NewsRequest extends FormRequest
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
        if(\Request::route()->getName() == 'admin.news') {
            return [
                'ar_name' => 'required',
                'en_name' => 'required',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'ar_description' => 'required',
                'en_description' => 'required'
            ];
        }else{
            return [
                'ar_name' => 'required',
                'en_name' => 'required',
                'image' => 'image|mimes:jpeg,jpg,png,gif,svg|max:20000',
                'ar_description' => 'required',
                'en_description' => 'required'
            ];
        }
    }

    public function messages()
    {
        if(\Request::route()->getName() == 'admin.news') {
            return [
                'ar_name.required' => 'Please enter news title in arabic',
                'en_name.required' => 'Please enter news title in english',
                'image.required' => 'You must upload an image',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'ar_description.required' => 'Please enter description in arabic',
                'en_description.required' => 'Please enter description in english'
            ];
        }else{
            return [
                'ar_name.required' => 'Please enter news title in arabic',
                'en_name.required' => 'Please enter news title in english',
                'image.image' => 'Please enter image',
                'image.mimes' => 'Image type should be : jpeg,jpg,png,gif ' ,
                'image.max' => ' Image size should be less than 2MB',
                'ar_description.required' => 'Please enter description in arabic',
                'en_description.required' => 'Please enter description in english'
            ];
        }
    }

    public function store(){
        $news  = new News();

        $file = $this->image;
        $destination = storage_path('uploads/news');

        if (!empty($file)) {
//            @unlink($destination . "/{$event->image}");
            $news->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $news->image);
            Image::make($destination.'/'.$news->image)->resize(445,295)->save($destination.'/'.$news->image);
        }

        $news->slug = str_slug($this->en_name);

        if ($news->save()){
            $news->details()->create([
                'name' => $this->ar_name,
                'description' => $this->ar_description,
                'lang' => 'ar'
            ]);

            $news->details()->create([
                'name' => $this->en_name,
                'description' => $this->en_description,
                'lang' => 'en'
            ]);
        }
    }

    public function edit($id){
        $news = News::find($id);

        $file = $this->image;
        $destination = storage_path('uploads/news');

        if (!empty($file)) {
            @unlink($destination . "/{$news->image}");
            $news->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $news->image);
            Image::make($destination.'/'.$news->image)->resize(445,295)->save($destination.'/'.$news->image);
        }

        $news->save();

        $news->arabic()->update([
            'name' => $this->ar_name,
            'description' => $this->ar_description,
            'lang' => 'ar'
        ]);

        $news->english()->update([
            'name' => $this->en_name,
            'description' => $this->en_description,
            'lang' => 'en'
        ]);

    }
}
