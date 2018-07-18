<?php

namespace App\Http\Requests;

use App\ContactUsSection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ContactUsSectionRequest extends FormRequest
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
            'ar_branch' => 'required',
            'en_branch' => 'required',
            'ar_address' => 'required',
            'en_address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'ar_branch.required' => 'Please enter the branch name in arabic',
            'en_branch.required' => 'Please enter the branch name in english',
            'ar_address.required' => 'Please enter the address in arabic',
            'en_address.required' => 'Please enter the address in english',
            'phone.required' => 'Please enter the phone number ',
            'email.required' => 'Please enter the email',
        ];
    }

    public function store()
    {
        $section = new ContactUsSection();

        $section->phone = $this->phone;
        $section->email = $this->email;
        $section->mobile = $this->mobile;
        $section->website = $this->website;

        $section->save();

        $section->details()->create([
            'branch' => $this->en_branch,
            'address' => $this->en_address,
            'lang' => 'en'
        ]);
        $section->details()->create([
          'branch' => $this->ar_branch,
          'address' => $this->ar_address,
          'lang' => 'ar'
        ]);
    }

    public function edit($id)
    {
        $section = ContactUsSection::find($id);

        $section->phone = $this->phone;
        $section->email = $this->email;
        $section->mobile = $this->mobile;
        $section->website = $this->website;

        $section->save();

        $section->english()->update([
            'branch' => $this->en_branch,
            'address' => $this->en_address
        ]);
        $section->arabic()->update([
          'branch' => $this->ar_branch,
          'address' => $this->ar_address
        ]);
    }
}
