<?php

namespace guiaceliaca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipesClientCreateRequest extends FormRequest
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
            'photo' => 'mimes:jpeg,jpg,png,gif|max:1000',
            'ingredients' => 'required|min:10',
            'steps' => 'required|min:10',
            'category_id' => 'required',
        ];
    }
}
