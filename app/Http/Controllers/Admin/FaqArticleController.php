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
    public function __construct(FaqData $faqData)
    {
        $this->middleware('auth');
        $this->faqData = $faqData;
    }

    /**
     * Admin: FAQ listing page
     */
    public function index(Request $request)
    {        
        return view('admin.faq_data.list');
    }

    /**
     * Admin: Get listing of faq items with filtered data
     */
    public function get(Request $request)
    {
        $draw = $request->get('draw');
        //$totalRecords = $this->systemLinks->totalRecords();
        $totalRecordswithFilter = $this->faqData->getFaqData('', '', '', '', config('constants.get_type_count'));
        $records = $this->faqData->getFilteredData($request, 'data');

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $records
        );
        return response()->json($response);
    }



}
