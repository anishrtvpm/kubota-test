<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqArticle extends Model
{
    use HasFactory;

    protected $table = 'faqs_data';
    const UPDATED_AT = 'modified_at';
    protected $primaryKey = 'faq_id';
    public function getFaqList($request){
        $search_keyword = $request->get('search_keyword');
        $top_category = $request->get('top_category');
        $sub_category = $request->get('sub_category');

        $faqData = FaqArticle::select('faq_id', 'category_id', 'title', 'search_qa_message');
        if ($search_keyword != null) {
            $faqData->where(function ($query) use ($search_keyword) {
                $halfName = mb_convert_kana($search_keyword, 'k');
                $fullName = mb_convert_kana($search_keyword, 'KV');
                $query->where("title", "like", '%' . $halfName . '%')
                    ->orWhere("title", "like", '%' . $fullName . '%')
                    ->orWhere('title', 'like', '%' . $search_keyword . '%');
            });
        }
        if ($top_category != null) {
            $faqData->where('status', config('constants.public'));
        }
        if ($sub_category != null) {
            $faqData->where('status', config('constants.public'));
        }
        $faqData->where('status', config('constants.public'));
        $faqData->orderBy('sort', 'asc');
        return $faqData->paginate(config('constants.data_table_per_page'));
    }
}
