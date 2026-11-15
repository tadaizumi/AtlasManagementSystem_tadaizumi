<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'sub_category_name' => 'required|string|max:100|unique:',
        ];
    }

    public function messages(){
        return [
            'sub_category_name.required' => '※サブカテゴリーは必ず入力してください。',
            'sub_category_name.string' => '※サブカテゴリーは文字列である必要があります。',
            'sub_category_name.max' => '※サブカテゴリーは100文字以内で入力してください。',
        ];
    }
}
