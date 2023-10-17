<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FaqController extends Controller
{
    private $faqCategory;
    private $faqData;
    public function __construct(FaqCategory $faqCategory, FaqData $faqData)
    {
        $this->middleware('auth');
        $this->faqCategory = $faqCategory;
        $this->faqData = $faqData;
    }

    /**
     * This method navigates to the list page
     */
    public function index()
    {
        $topCategories = $this->faqCategory->getTopCategories();
        return view('user.faq.list')->with([
            'topCategories' => $topCategories,
        ]);
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
        $userInfo = getUser(authUser()->guid);
        $groupId = $userInfo ? $userInfo['group_id'] : null;
        $faqData = $this->faqData->getFaqList($request, $groupId);
        return view('user.faq.ajax_list')->with(['faqData' => $faqData]);
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

    /**
     * This method shows detailed information about a specific faq .
     * @param  int  $id
     * @return mixed
     */
    public function detail($id)
    {
        $userInfo = getUser(authUser()->guid);
        $groupId = $userInfo ? $userInfo['group_id'] : null;
        try {
            $faqData = $this->faqData->getFaqDetail($id, $groupId);
            if (empty($faqData[0])) {
                return Redirect::back()->with('error', __('invalid_request_error'));
            }
            return view('user.faq.detail')->with(['faqData' => $faqData]);
        } catch (\Exception $e) {
            return Redirect::back()->with('error', __('invalid_request_error'));
        }
    }
}