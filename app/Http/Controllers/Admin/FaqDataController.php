<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqDataRequest;
use App\Models\FaqData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FaqDataController extends Controller
{
    private $faqData;
    public function __construct(FaqData $faqData)
    {
        $this->middleware('auth');
        $this->faqData = $faqData;
    }

    public function create()
    {
        $topCategories = $this->faqData->getTopCategories();
        $userGroups = getActiveUserGroups();
        return view('admin.faq_data.edit')->with(['topCategories' => $topCategories,
         'userGroups' => $userGroups, 'displayGroups' => []]);
    }

    public function store(FaqDataRequest $request)
    {
        $validateData = $this->faqData->validateInputData($request);
        if ($validateData['error']) {
            return Redirect::back()->with('error', $validateData['message']);
        }

        $faqId = $this->faqData->saveRecords($request);
        if (!$faqId) {
            return Redirect::back()->with('error', trans('invalid_request_error'));
        }

        $message = $request->get('faq_id') ? 'FAQを更新しました。' : 'FAQを作成しました。';
        return redirect('faq_data/create')->with('message', $message);
    }

    public function edit($id)
    {
        $topCategories = $this->faqData->getTopCategories();
        $userGroups = getActiveUserGroups();

        try {
            $faqData = $this->faqData->getFaqData($id);
            if (!$faqData) {
                return Redirect::back()->with('error', trans('invalid_request_error'));
            }
            $displayGroups = explode(',', $faqData->display_group);
            return view('admin.faq_data.edit')->with([
                'faqData' => $faqData,
                'topCategories' => $topCategories,
                'userGroups' => $userGroups,
                'displayGroups' => $displayGroups
            ]);

        } catch (\Exception $e) {
            return redirect('faq_data/create')->with('error', trans('invalid_request_error'));
        }
    }

    /**
     * Fetch categories
     * @param object $request
     * @return mixed
     */
    public function getCategory(Request $request)
    {
        return $this->faqData->getSubCategories($request);
    }

    /**
     * Ajax validation for unique sort order
     * @param object $request
     * @return boolean
     */
    public function checkSortOrder(Request $request)
    {
        $isExist = $this->faqData->checkSortOrderExists($request);
        if ($isExist) {
            return true;
        }
        return false;
    }

    
    public function delete(Request $request)
    {
        $faqData = $this->faqData->deleteRecord($request);
        if ($faqData) {
            return response()->json(['message' => "削除に成功"]);
        }
        return response()->json(['error' => trans('invalid_request_error')]);
    }
}