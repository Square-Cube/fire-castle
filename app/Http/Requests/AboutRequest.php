<?php

namespace App\Http\Requests;

use App\About;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutRequest extends FormRequest
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
            'ar_vision' => 'required',
            'ar_mission' => 'required',
            'ar_policy' => 'required',
            'en_vision' => 'required',
            'en_mission' => 'required',
            'en_policy' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ar_vision.required' => 'Please enter vision description in arabic',
            'ar_mission.required' => 'Please enter mission description in arabic',
            'ar_policy.required' => 'Please enter policy description in arabic',
            'en_vision.required' => 'Please enter vision description in english',
            'en_mission.required' => 'Please enter mission description in english',
            'en_policy.required' => 'Please enter policy description in english'
        ];
    }

    public function store(){
        $about = About::first();

        $about->arabic()->update([
            'vision' => $this->ar_vision,
            'mission' => $this->ar_mission,
            'policy' => $this->ar_policy
        ]);

        $about->english()->update([
            'vision' => $this->en_vision,
            'mission' => $this->en_mission,
            'policy' => $this->en_policy
        ]);
    }
}
