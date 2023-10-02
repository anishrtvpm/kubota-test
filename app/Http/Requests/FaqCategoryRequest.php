<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqCategoryRequest extends FormRequest
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
            'top_category_ja_name' => ['required','string','max:100'],
            'top_category_en_name'=> ['required','string','max:100'],
            'sub_category_ja_name'=> ['required','string','max:100'],
            'sub_category_en_name'=> ['required','string','max:100'],
            'sort' => ['required','integer','max:3'],
            'mail_form_id' => ['nullable','string','max:8000',],
        ];
    }

    public function messages(): array
    {
        return [
            'top_category_ja_name.required' => 'システム (JP) 必須',
            'top_category_ja_name.max'=> 'システム(JP)の長さは100文字を超えないこと',
            'top_category_en_name.required'=> 'カテゴリー名 (EN) 必須',
            'top_category_en_name.max'=> 'カテゴリー名(EN)の長さは100文字を超えないこと',
            'sub_category_ja_name.required'=> 'システム (JP) 必須',
            'sub_category_ja_name.max'=> 'システム(JP)の長さは100文字を超えないこと',
            'sub_category_en_name.required'=> 'カテゴリー名 (EN) 必須',
            'sub_category_en_name.max'=> 'カテゴリー名(EN)の長さは100文字を超えないこと',
            'sort.required' => '要ソート',
            'sort.max' => 'ソートの長さは3文字以内',
        ];
    }
}
