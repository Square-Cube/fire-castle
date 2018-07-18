<?php

namespace App\Http\Requests;

use App\Career;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CareerRequest extends FormRequest
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

    protected function failedValidation(Validator $validator) {
        $result = ['response' => 'error' ,'message' => implode("<br>" ,$validator->errors()->all())];
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
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'position' => 'required',
            'resume' => 'required|mimes:pdf,png,jpg,doc,docx'
        ];
    }

    public function messages()
    {
        return [
            'f_name.required' => 'Please enter your first name',
            'l_name.required' => 'Please enter your last name',
            'email.required' => 'Please enter your email',
            'phone.required' => 'Please enter your phone',
            'position.required' => 'Please enter position name',
            'resume.required' => 'Please upload your resume',
            'resume.mimes' => 'The only allowed formats are : Jpg,Png,Pdf,Doc,Docx'
        ];
    }

    public function store(){
        $career = new Career();

        $career->f_name = $this->f_name;
        $career->l_name = $this->l_name;
        $career->email = $this->email;
        $career->phone= $this->phone;
        $career->position = $this->position;

        $file = $this->resume;
        $destination = storage_path('uploads/resume');

        if (!empty($file)) {
            // @unlink($destination . "/{$career->resume}");
            $career->resume = md5(time()).'.'.$file->getClientOriginalName();
            $this->resume->move($destination, $career->resume);
        }

        $career->save();

    }
}
