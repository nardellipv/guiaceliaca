<?php

namespace guiaceliaca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileCommerceRequest extends FormRequest
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
            'name' => 'required | min:5',
            'address' => 'required | min:10',
            'phone' => 'nullable | numeric ',
            'about' => 'required | min:10',
            'web' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ];
    }
}
