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


    // バリデーションの前にデータを加工・結合する
    protected function prepareForValidation()
    {
        $year = $this->input('old_year');
        $month = $this->input('old_month');
        $day = $this->input('old_day');


        // 年、月、日がすべて入力されている場合のみ結合する
        if ($year && $month && $day) {
            $date = sprintf('%04d-%02d-%02d', $year, $month, $day);
            $this->merge(['combined_date' => $date]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    // バリデーションルールの定義
    public function rules()
    {
        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/^[ァ-ヶー]+$/u|max:30',
            'under_name_kana' => 'required|string|regex:/^[ァ-ヶー]+$/u|max:30',
            'mail_address' => 'required|email|max:100|unique:users',
            'sex' => 'required|regex:/^[1-3]+$/u',
            'old_year' => 'required|digits:4',
            'old_month' => 'required|between:1,12',
            'old_day' => 'required|between:1,31',
            'combined_date' => 'required|date_format:Y-m-d|after_or_equal:2001-01-01|before_or_equal:today',
            'role' => 'required|regex:/^[1-4]+$/u',
            'password' => 'required|between:8,30|confirmed',
        ];
    }

    // エラーメッセージ
    public function messages(){
        return [
            'over_name.required' => '※名前は必ず入力してください。',
            'over_name.string' => '※名前は文字列である必要があります。',
            'over_name.max' => '※名前は10文字以内で入力してください。',
            // 'under_name.required' => '※名前は必ず入力してください。',
            // 'under_name.string' => '※名前は文字列である必要があります。',
            // 'under_name.max' => '※名前は10文字以内で入力してください。',

            'over_name_kana.required' => '※カナは必ず入力してください。',
            'over_name_kana.string' => '※カナは文字列である必要があります。',
            'over_name_kana.max' => '※カナは30文字以内で入力してください。',
            'over_name_kana.regex' => '※カタカナのみで入力してください。',
            // 'under_name_kana.required' => '※カナは必ず入力してください。',
            // 'under_name_kana.string' => '※カナは文字列である必要があります。',
            // 'under_name_kana.max' => '※カナは30文字以内で入力してください。',
            // 'under_name_kana.regex' => '※カタカナのみで入力してください。',

            'mail_address.required' => '※メールアドレスは必ず入力してください。',
            'mail_address.email' => '※メールアドレス形式で入力してください。',
            'mail_address.max' => '※メールアドレスは100文字以内で入力してください。',
            'mail_address.unique' => '※すでに登録されているメールアドレスです。',

            'sex.required' => '※性別は必ず入力してください。',
            'sex.regex' => '※男、女、その他より選択してください。',

            'combined_date.date_format' => '※有効な日付を入力してください。',
            'combined_date.required' => '※正しい日付を入力してください。',
            'combined_date.after_or_equal' => '※2000年1月1日以降の日付を入力してください。',
            'combined_date.before_or_equal' => '※今日より過去の日付を入力してください。',

            'role.required' => '※役職は必ず入力してください。',
            'role.regex' => '※講師(国語)、講師(数学)、講師(英語)より選択してください。',

            'password.required' => '※パスワードは必ず入力してください。',
            'password.between' => '※パスワードは8~30文字以内で入力してください。',
            'password.confirmed' => '※確認用パスワードと一致しません。',
        ];
    }
}
