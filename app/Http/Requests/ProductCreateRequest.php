<?php

namespace guiaceliaca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'category_id' => 'required',
            'description' => 'required|max:250',
            'price' => 'required|max:10',
            'offer' => 'max:10',
            'available' => 'required',
            'photo' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ];
    }
}
