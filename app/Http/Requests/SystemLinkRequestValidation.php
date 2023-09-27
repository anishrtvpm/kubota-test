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
            'sort' => ['required','integer','max:3'],
            'ja_system_name'=> ['required','string','max:100'],
            'en_system_name'=> ['required','string','max:100'],
            'ja_url'=> ['nullable','string','max:8000',
            'regex:/^(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/'],
            'en_url' => ['nullable','string','max:8000',
            'regex:/^(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/'],
        ];
    }

    public function messages(): array
    {
        return [
            'category.required' => trans('category_required'),
            'sort.required' => trans('sort_required'),
            'sort.max' => trans('sort_max_length'),
            'ja_system_name.required'=> trans('jp_system_name_required'),
            'ja_system_name.max'=> trans('jp_system_name_max_length'),
            'en_system_name.required'=> trans('en_system_name_required'),
            'en_system_name.max'=> trans('en_system_name_max_length'),
            'ja_url.max'=> trans('url_jp_max_length'),
            'ja_url.regex'=> trans('url_invalid'),
            'en_url.max' => trans('url_en_max_length'),
            'en_url.regex' => trans('url_invalid'),
        ];
    }
}
