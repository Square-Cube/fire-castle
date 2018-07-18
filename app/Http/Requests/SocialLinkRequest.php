<?php

namespace App\Http\Requests;

use App\SocialLink;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SocialLinkRequest extends FormRequest
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
            'icon' => 'required' ,
            'link' => 'required',
            'ar_title' => 'required',
            'en_title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'icon.required' => 'Please select your preferred icon',
            'link.required' => 'Please enter your link',
            'ar_title.required' => 'Please enter the arabic title',
            'en_title.required' => 'Please enter english title'
        ];
    }

    public function store()
    {
        $social = new SocialLink();

        $social->icon = $this->icon;
        $social->link = $this->link;

        if ($social->save()){
            $social->details()->create([
                'title' => $this->ar_title,
                'lang' => 'ar'
            ]);

            $social->details()->create([
                'title' => $this->en_title,
                'lang' => 'en'
            ]);
        }
    }

    public function edit($id)
    {
        $social = SocialLink::find($id);

        $social->icon = $this->icon;
        $social->link = $this->link;

        $social->save();

        $social->english()->update([
            'title' => $this->en_title
        ]);

        $social->arabic()->update([
            'title' => $this->ar_title
        ]);
    }
}
