<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/^[ァ-ヾ]+$/u|max:30',
            'under_name_kana' => 'required|string|regex:/^[ァ-ヾ]+$/u|max:30',
            'mail_address' => 'required|email|max:100|unique:users',
            'sex' => 'required|regex:/^[男|女|その他]+$/u',
            'old_year, old_month, old_day' => 'required|date|date_format:Y-m-d|after:"2000-01-01"|before:today',
            'role' => 'required|regex:/^[講師(国語)|講師(数学)|講師(英語)]+$/u',
            'password' => 'required|between:8,30|confirmed',
        ];
    }

    public function messages(){
        return [
            'over_name.required,under_name.required' => '名前は必ず入力してください。',
            'over_name.string,under_name.string' => '名前は文字列である必要があります。',
            'over_name.max,under_name.max' => '名前は10文字以内で入力してください。',

            'over_name_kana.required,under_name_kana.required' => 'カナは必ず入力してください。',
            'over_name_kana.string,under_name_kana.string' => 'カナは文字列である必要があります。',
            'over_name_kana.max,under_name_kana.max' => 'カナは30文字以内で入力してください。',
            'over_name_kana.regex,under_name_kana.regex' => 'カタカナのみで入力してください。',

            'mail_address.required' => 'メールアドレスは必ず入力してください。',
            'mail_address.email' => 'メールアドレス形式で入力してください。',
            'mail_address.max' => 'メールアドレスは100文字以内で入力してください。',
            'mail_address.unique' => 'すでに登録されているメールアドレスです。',

            'sex.required' => '性別は必ず入力してください。',
            'sex.regex' => '男、女、その他より選択してください。',

            'old_year.required, old_month.required, old_day.required' => '生年月日は必ず入力してください。',
            'old_year.date, old_month.date, old_day.date' => '日付形式で入力してください。',
            'old_year.date_format, old_month.date_format, old_day.date_format' => '存在しない日付です。',
            'old_year.after, old_month.after, old_day.after' => '2000年1月1日より前の日付は指定できません。',
            'old_year.before, old_month.before, old_day.before' => '今日より後の日付は指定できません。',

            'role.required' => '役職は必ず入力してください。',
            'role.regex' => '講師(国語)、講師(数学)、講師(英語)より選択してください。',

            'password.required' => 'パスワードは必ず入力してください。',
            'password.between' => 'パスワードは8~30文字以内で入力してください。',
            'password.confirmed' => '確認用パスワードと一致しません。',
        ];
    }
}
