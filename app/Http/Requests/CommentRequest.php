<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'required|string|max:250',
        ];
    }

    public function messages(){
        return [
            'comment.required' => '※内容は必ず入力してください。',
            'comment.string' => '※内容は文字列である必要があります。',
            'comment.max' => '※最大文字数は250文字です。',
        ];
    }
}
