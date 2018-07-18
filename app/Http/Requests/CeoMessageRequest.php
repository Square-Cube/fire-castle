<?php

namespace App\Http\Requests;

use App\CeoMessage;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class CeoMessageRequest extends FormRequest
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
            'en_description' => 'required',
            'ar_name' => 'required',
            'en_name' => 'required',
            'ar_job' => 'required',
            'en_job' => 'required'
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
            'en_description.required' => 'Please enter content in english',
            'ar_name.required' => 'Please enter CEO name in arabic',
            'en_name.required' => 'Please enter CEO name in english',
            'ar_job.required' => 'Please enter job title in arabic',
            'en_job.required' => 'Please enter job title in english'
        ];
    }

    public function store(){
        $message  = CeoMessage::first();

        $file = $this->image;
        $destination = storage_path('uploads/messages');

        if (!empty($file)) {
            @unlink($destination . "/{$message->image}");
            $message->image = md5(time()).'.'.$file->getClientOriginalName();
            $this->image->move($destination, $message->image);
            Image::make($destination.'/'.$message->image)->resize(220 ,277)->save($destination.'/'.$message->image);
        }

        $message->save();

        $message->arabic()->update([
            'title' => $this->ar_title,
            'description' => $this->ar_description,
            'name' => $this->ar_name,
            'job' => $this->ar_job
        ]);

        $message->english()->update([
            'title' => $this->en_title,
            'description' => $this->en_description,
            'name' => $this->en_name,
            'job' => $this->en_job
        ]);

    }
}
