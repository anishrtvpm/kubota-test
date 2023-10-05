<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemLinkRequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category' => ['required','integer'],
            'sort' => ['required','integer','min:0','max:999'],
            'ja_system_name'=> ['required','string','max:100'],
            'en_system_name'=> ['required','string','max:100'],
            'ja_url'=> ['nullable','string','max:255',
            'regex:/^(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/'],
            'en_url' => ['nullable','string','max:255',
            'regex:/^(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/'],
        ];
    }

    public function messages(): array
    {
        return [
            'category.required' => '要カテゴリー',
            'sort.required' =>'要ソート',
            'sort.max' => 'ソートの長さは3文字以内',
            'ja_system_name.required'=> 'タイトル(JP) 必須',
            'ja_system_name.max'=> 'タイトル(JP)の長さは100文字を超えないこと',
            'en_system_name.required'=> 'タイトル(EN) 必須',
            'en_system_name.max'=> 'タイトル(EN)の長さは100文字を超えないこと',
            'ja_url.max'=> 'タイトル(JP)の長さは255文字を超えないこと',
            'ja_url.regex'=> '有効なURLを入力してください',
            'en_url.max' => 'タイトル(EN)の長さは255文字を超えないこと',
            'en_url.regex' => '有効なURLを入力してください',
            'sort.min' => '数値は0より大きくなければならない。',
        ];
    }
}
