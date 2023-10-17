<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\SystemLinks;
use App\Models\SystemLinkCategory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SystemLinkRequestValidation;

class SystemLinksController extends Controller
{
    private $systemLinks;
    public function __construct(SystemLinks $systemLinks)
    {
        $this->middleware('auth');
        $this->systemLinks = $systemLinks;
    }

    /**
     * This method navigates to the list page
     */
    public function index(Request $request)
    {
        $systemLinkCategory = SystemLinkCategory::orderBy('category_id', 'asc')->get();
        return view('admin.system_links.list')->with(['systemLinkCategory' => $systemLinkCategory]);
    }

    /**
     * Retrieve and return data using AJAX.
     *
     * This method handles AJAX requests to fetch data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request)
    {
        $draw = $request->get('draw');
        $totalRecords = $this->systemLinks->totalRecords();
        $totalRecordswithFilter = $this->systemLinks->getSystemLinkData('', '', '', '', config('constants.get_type_count'));
        $records = $this->systemLinks->getFilteredData($request, 'data');

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $records
        );
        return response()->json($response);
    }

    /**
     *
     * This method displays the add form and edit form for a specific system link.
     *
     * @param  int  $id
     * @return mixed
     */
    public function edit(Request $request)
    {
        $id = $request->get('id');
        $systemLinkCategory = SystemLinkCategory::orderBy('category_id', 'asc')->get();
        if ($id) {
            try {
                $systemLinkData = SystemLinks::where('system_id', $id)->where('is_deleted', 0)->first();
                if (!$systemLinkData) {
                    return Redirect::back()->with('error', trans('invalid_request_error'));
                }
                return view('admin.system_links.form_modal')->with(['systemLinkData' => $systemLinkData, 'systemLinkCategory' => $systemLinkCategory]);
            } catch (\Exception $e) {
                return Redirect::back()->with('error', trans('invalid_request_error'));
            }
        } else {
            return view('admin.system_links.form_modal')->with(['systemLinkData' => [], 'systemLinkCategory' => $systemLinkCategory]);
        }

    }

    /**
     *
     * This method handles the creation and updation of system links.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */

    public function store(SystemLinkRequestValidation $request)
    {
        $validateData = $this->systemLinks->systemNameExists($request);
        if ($validateData) {
            return response()->json(['error' => 'タイトルはすでにこのカテゴリにあります。'], 422);
        }
        $systemId = $this->systemLinks->saveRecords($request);
        if (!$systemId) {
            return Redirect::back()->with('error', trans('invalid_request_error'));
        }
        $successMessage = $request->get('system_id') ? "システムリンクが正常に更新された" : "システムリンクの作成に成功";
        return response()->json(['message' => $successMessage]);
    }

    /**
     * Remove the specified system links
     *
     * This method handles the deletion of a system links
     *
     * @param  int  $id
     */
    public function delete(Request $request)
    {
        $systemLinks = $this->systemLinks->deleteRecords($request);
        if ($systemLinks) {
            return response()->json(['message' => "削除に成功"]);
        }
        return response()->json(['error' => trans('invalid_request_error')]);
    }

    /**
     * Check if a systemname exists.
     *
     * This method checks if a systemname exists in the system.
     *
     * @param  string  $name
     * @return boolean
     */
    public function systemNameExists(Request $request)
    {
        $isExists = $this->systemLinks->systemNameExists($request);
        if ($isExists) {
            return true;
        }
        return false;
    }
}