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
        return view('admin.faq_data.edit')->with(['topCategories' => $topCategories]);
    }

    public function store(FaqDataRequest $request)
    {
        $validateData = $this->faqData->validateInputData($request);
        if ($validateData['error']) {
            return Redirect::back()->with('error', $validateData['message']);
        }

        $faqId = $this->faqData->saveRecords($request);
        if (!$faqId) {
            return Redirect::back()->with('error', 'Invalid request');
        }

        $successMessage = $request->get('faq_id') ? 'Edit success' : 'Create success';
        dd($successMessage);
    }

    public function edit($id)
    {
        try {
            $faqData = $this->faqData->getCompanyData($id);
            if (!$faqData) {
                return Redirect::back()->with('error', 'Invalid Request');
            }
            return view('faq_data.edit')->with([
                'faqData' => $faqData
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->with('error', 'Invalid Request');
        }
    }

    /**
     * Fetch categories 
     */
    public function getCategory(Request $request)
    {
        return $this->faqData->getSubCategories($request);
    }
}