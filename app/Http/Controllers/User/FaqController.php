<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FaqArticle;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private $faqCategory;
    private $faqArticle;
    public function __construct(FaqCategory $faqCategory, FaqArticle $faqArticle)
    {
        $this->middleware('auth');
        $this->faqCategory = $faqCategory;
        $this->faqArticle = $faqArticle;
    }
    public function index()
    {
        $faqCategory = $this->faqCategory->getFaqCategory();
        return view('user.faq.list')->with([
            'faqCategory' => $faqCategory,
        ]);
    }

    public function getFaqList()
    {
        $faqData = FaqArticle::select('faq_id', 'category_id', 'title', 'search_qa_message')
            ->where('status', config('constants.public'))
            ->orderBy('sort', 'asc')
            ->paginate(config('constants.data_table_per_page'));
        return view('user.faq.ajax_list')->with(['faqData' => $faqData]);
    }
}