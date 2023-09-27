<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private $faqCategories;
    public function __construct(FaqCategory $faqCategories)
    {
        $this->middleware('auth');
        $this->faqCategories = $faqCategories;
    }

    public function categories(Request $request)
    {
        return view('admin.faq.category_list');
    }

    public function getAllCategories(Request $request)
    {
        $draw = $request->get('draw');
        $totalRecords = $this->faqCategories->totalRecords();
        $totalRecordswithFilter = $this->faqCategories->recordsWithFilter( '', '', '', '', config('constants.get_type_count'));
        $records = $this->faqCategories->getFilteredData($request);

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $records
        );
        return response()->json($response);
    }
}
