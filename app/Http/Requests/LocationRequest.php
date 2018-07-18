<?php

namespace App\Http\Requests;

use App\Location;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LocationRequest extends FormRequest
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
            'ar_name' => 'required',
            'en_name' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'ar_name.required' => 'Please enter location name in arabic',
            'en_name.required' => 'Please enter location name in english'
        ];
    }

    public function store(){
        $location = new Location();

        if ($location->save()){
            $location->details()->create([
                'name' => $this->ar_name,
                'lang' => 'ar'
            ]);

            $location->details()->create([
                'name' => $this->en_name,
                'lang' => 'en'
            ]);
        }
    }

    public function edit($id){
        $location = Location::find($id);

        $location->english()->update([
            'name' => $this->en_name
        ]);

        $location->arabic()->update([
            'name' => $this->ar_name
        ]);

    }
}
