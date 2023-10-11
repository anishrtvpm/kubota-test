<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqData;

class FaqArticleController extends Controller
{
    private $faqData;
    public function __construct(FaqData $faqData)
    {
        $this->middleware('auth');
        $this->faqData = $faqData;
    }

}
