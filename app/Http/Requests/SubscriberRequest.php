<?php

namespace App\Http\Requests;

use App\Subscriber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubscriberRequest extends FormRequest
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
        $result = ['response' => 'error' ,'message' => implode(PHP_EOL ,$validator->errors()->all())];
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
            'email' => 'required|unique:subscribers|email'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال بريدك الاكتروني ',
            'email.unique' => app()->getLocale() == 'en' ? 'You are already a subscriber with us' : 'انت مشترك معنا بالفعل',
            'email.email' => app()->getLocale() == 'en' ? 'Please enter a valid email' : 'برجاء ادخال بريد الكتروني صحيح'
        ];
    }

    public function store(){
        $subscriber = new Subscriber();

        $subscriber->email = $this->email;

        $subscriber->save();

        $subject = 'Confirm message';

        $message = 'Dear  '

            . '<strong>' . $subscriber->email . '</strong><br/><br/>'

            .'This is a message to confirm that you have subscribed for our newsletter service<br/><br/>'

            . 'Kind Regards,<br/>'

            . 'Fire-Castle Team';

        $from = 'subscribe@firecastle.com';

        $headers = '';

        $headers .= 'From:Fire castle  <' . $from . '>   ' . "\r\n";

        $headers .= "Reply-To: " . $from . "\r\n";

        $headers .= "MIME-Version: 1.0\r\n";

        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $headers.= "Bcc:zeezo.gamal@gmail.com";

        mail($subscriber->email , $subject, $message, $headers);
    }
}
