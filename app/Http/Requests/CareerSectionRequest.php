<?php

namespace App\Http\Requests;

use App\CareerSection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class CareerSectionRequest extends FormRequest
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
            'ar_title' => 'required',
            'en_title' => 'required',
            'ar_description' => 'required',
            'en_description' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'ar_title.required' => 'Please enter title in arabic',
            'en_title.required' => 'Please enter title in english',
            'ar_description.required' => 'Please enter description in arabic',
            'en_description.required' => 'Please enter description in english'
        ];
    }

    public function store(){
        $section = CareerSection::first();

        $section->english()->update([
            'title' => $this->en_title,
            'description' => $this->en_description
        ]);
        $section->arabic()->update([
            'title' => $this->ar_title,
            'description' => $this->ar_description
        ]);
    }
}
