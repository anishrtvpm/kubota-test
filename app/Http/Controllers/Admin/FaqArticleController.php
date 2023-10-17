<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqData;
use App\Models\FaqCategory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class FaqArticleController extends Controller
{
    private $faqData;
    private $faqCategory;
    public function __construct(FaqData $faqData, FaqCategory $faqCategory)
    {
        $this->middleware('auth');
        $this->faqData = $faqData;
        $this->faqCategory = $faqCategory;
    }

    /**
     * Admin: FAQ listing page
     */
    public function index(Request $request)
    {        
        $topCategories = $this->faqCategory->getTopCategories('ja');
        return view('admin.faq_data.list')->with([
            'topCategories' => $topCategories,
        ]);
    }

    /**
     * Admin: Get listing of faq items with filtered data
     */
    public function get(Request $request)
    {
        $draw = $request->get('draw');
        $totalRecords = $this->faqData->totalRecords();
        $totalRecordswithFilter = $this->faqData->getFaqData('', '', '', '', config('constants.get_type_count'), $request);
        $records = $this->faqData->getFilteredData($request, 'data');

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $records
        );
        return response()->json($response);
    }

    /**
     * Retrieve and return data using AJAX.
     *
     * This method handles AJAX requests to fetch sub categories based on selected top categories in faq list page  
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function getSubCategories(Request $request)
    {
        return $this->faqCategory->getSubCategories($request);
    }



}
