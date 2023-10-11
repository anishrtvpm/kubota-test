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

    public function getFaqList(Request $request)
    {
        $faqData=$this->faqArticle->getFaqList($request);
        return view('user.faq.ajax_list')->with(['faqData' => $faqData]);
    }
}