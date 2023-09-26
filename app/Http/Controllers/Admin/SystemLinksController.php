<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemLinks;
use App\Models\SystemLinkCategory;
use Illuminate\Support\Facades\Redirect;

class SystemLinksController extends Controller
{
    private $systemLinks;
    public function __construct(SystemLinks $systemLinks)
    {
        $this->middleware('auth');
        $this->systemLinks = $systemLinks;
    }
    public function index(Request $request)
    {
        $systemLinkCategory = SystemLinkCategory::orderBy('category_id', 'asc')->get();
        return view('admin.system_links.list')->with(['systemLinkCategory' => $systemLinkCategory]);
    }

    public function get(Request $request){
        $draw = $request->get('draw');
        $totalRecords = $this->systemLinks->totalRecords();
        $totalRecordswithFilter = $this->systemLinks->getSystemLinkData($request, '', '', '', '', config('constants.get_type_count'));
        $records = $this->systemLinks->getFilteredData($request, 'data');

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
        try {
            $systemLinkCategory = SystemLinkCategory::orderBy('category_id', 'asc')->get();
            $systemLinkData=SystemLinks::where('system_id', $id)->where('is_deleted', 0)->first();
            if (!$systemLinkData) {
                return Redirect::back()->with('error', __('language.invalid_request_error'));
            }
            return view('admin.system_links.form_modal')->with(['systemLinkData'=>$systemLinkData,'systemLinkCategory'=> $systemLinkCategory]);
        } catch (\Exception $e) {
            return Redirect::back()->with('error', __('language.invalid_request_error'));
        }
    }
}
