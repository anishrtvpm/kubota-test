<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqCategoryRequest;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FaqCategoryController extends Controller
{
    private $faqCategories;
    public function __construct(FaqCategory $faqCategories)
    {
        $this->middleware('auth');
        $this->faqCategories = $faqCategories;
    }

    public function index(Request $request)
    {
        return view('admin.faq_category.category_list');
    }

    public function get(Request $request)
    {
        $draw = $request->get('draw');
        $totalRecords = $this->faqCategories->totalRecords();
        $totalRecordswithFilter = $this->faqCategories->recordsWithFilter('', '', '', '', config('constants.get_type_count'));
        $records = $this->faqCategories->getFilteredData($request);

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $records
        );
        return response()->json($response);
    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        if ($id) {
            try {
                $faqCategoryData = FaqCategory::where('category_id', $id)->where('is_deleted', 0)->first();
                if (!$faqCategoryData) {
                    return Redirect::back()->with('error', trans('invalid_request_error'));
                }
                return view('admin.faq_category.form_modal')->with('faqCategoryData', $faqCategoryData);
            } catch (\Exception $e) {
                return Redirect::back()->with('error', trans('invalid_request_error'));
            }
        } else {
            return view('admin.faq_category.form_modal')->with('faqCategoryData', []);
        }
    }

    public function store(FaqCategoryRequest $request)
    {

        $validateData = $this->faqCategories->validateInputData($request);
        if ($validateData['error']) {
            return response()->json(['error' => $validateData['message'],'field'=>$validateData['field']], 422);
        }
 
        $categoryId = $this->faqCategories->saveRecords($request);
        if (!$categoryId) {
            return Redirect::back()->with('error', trans('invalid_request_error'));
        }
        $successMessage = $request->get('faq_category_id') ? trans('system_links_update_success') : trans('system_links_create_success');
        return response()->json(['message' => $successMessage]);
    }
}