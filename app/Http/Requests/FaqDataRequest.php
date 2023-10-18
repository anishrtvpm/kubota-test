<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqDataRequest extends FormRequest
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
            'top_category_name' => ['required'],
            'category_id' => ['required'],
            'sort' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:100'],
            'reference_url' => ['max:8000'],
            'question_date' => ['required'],
            'answer_date' => ['required', 'after_or_equal:question_date'],
            'responder' => ['required', 'string', 'max:100'],
            'status' => ['required', 'integer'],
            'language' => ['required', 'string'],
            // 'a_message' => ['required'],
            //  'q_message' => ['required'],
            'files.*' => [
                'file',
                'mimes:gif,tif,png,jpg,mov,mpg,wma,pdf,doc,docx,xls,xlsx,ppt,pptx,txt,csv,zip',
                function ($attribute, $value, $fail) {
                    $maxSize = $this->hasVideoExtension($value) ? 500 * 1024 : 100 * 1024;

                    if ($value->getSize() > $maxSize) {
                        $fail("The $attribute must not exceed " . ($maxSize / 1024) . " KB.");
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'top_category_name.required' => 'システムは必須項目です。',
            'category_id.required' => 'カテゴリは必須項目です。',
            'sort.required' => '表示順は必須項目です。',
            'sort.digits' => '表示順は 8文字以内で設定してください。',
            'sort.numeric' => '表示順は半角数値で入力してください。',
            'title.required' => 'タイトルは必須項目です。',
            'title.max' => 'タイトルは 100文字以内で設定してください。',
            'reference_url.max' => '参加URLは 8000文字以内で設定してください。',
            'question_date.required' => '質問日は必須項目です。',
            'answer_date.required' => '回答日は必須項目です。',
            'responder.required' => '回答者は必須項目です。',
            'responder.max' => '回答者は 100文字以内で設定してください。',
            'status.required' => '状態は必須項目です。',
            'language.required' => '言語は必須項目です。',
            'answer_date.after_or_equal' => '回答日は質問日と同じかそれ以上でなければなりません。',
            'files.array' => '3つのファイルのみアップロードしてください。',
            'files.*.file' => 'Invalid file.',
            'files.*.mimes' => 'Unsupported file format.',
        ];
    }

    private function hasVideoExtension($file)
    {
        $videoExtensions = ['mov', 'mpg', 'wma'];
        $extension = strtolower($file->getClientOriginalExtension());

        return in_array($extension, $videoExtensions);
    }
}