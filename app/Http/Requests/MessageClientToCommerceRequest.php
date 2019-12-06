<?php

namespace guiaceliaca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageClientToCommerceRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required | email',
            'messageText' => 'required | min:10',
//            'g-recaptcha-response' =>  'required|recaptcha',
        ];
    }
}
