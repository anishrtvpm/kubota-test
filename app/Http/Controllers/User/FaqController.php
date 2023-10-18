<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\FaqData;
use App\Models\IndSalesCorps;
use App\Models\InquiryForm;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use stdClass;


class FaqController extends Controller
{
    private $faqCategory;
    private $faqData;
    private $organization;
    public function __construct(
        FaqCategory $faqCategory,
        FaqData $faqData,
        Organization $organization
    ) {
        $this->middleware('auth');
        $this->faqCategory = $faqCategory;
        $this->faqData = $faqData;
        $this->organization = $organization;
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

    /**
     * Get enquiry form details
     * @param int $id
     * @return mixed
     */
    public function getInquiryForm($id)
    {
        
        $userInfo = getUser(authUser()->guid);
        if(!$this->faqData->checkFaqAccess($id, $userInfo['group_id']))
        {
            return Redirect::back()->with('error', __('invalid_request_error'));
        }

        $isKubotaUser = strlen(authUser()->guid) == config('constants.kubota_user_guid_length');

        $faqArticle = FaqData::find($id);
        if ($isKubotaUser)
        {
            $affiliations = $this->organization->getUserAffiliations($userInfo['email']);
        }
        else
        {
            $affiliations = IndSalesCorps::find($userInfo['company_id']);
        }
        
        $form = InquiryForm::find($faqArticle->faqCategory->mail_form_id);
        $fieldTypes = [
            'single_line' => 'text',
            'phone' => 'tel',
            'email' => 'email'
        ];
        return view('user.faq.inquiry_form')->with([
            'userInfo' => $userInfo,
            'faqArticle' => $faqArticle,
            'affiliations' => $affiliations,
            'form' => $form,
            'fieldTypes' => $fieldTypes,
            'isKubotaUser' => $isKubotaUser
        ]);
    }


    /**
     * Save Inquiry form data to cookie and confirm data
     * @param int $id
     * @param Request $request
     * @return mixed
     */
    public function submitInquiryEmail(Request $request, $id)
    {
        $userInfo = getUser(authUser()->guid);
        if(!$this->faqData->checkFaqAccess($id, $userInfo['group_id']))
        {
            return Redirect::back()->with('error', __('invalid_request_error'));
        }
        $staticValidationRules = $this->getStaticValidations()->validationRules;
        $staticValidationMessages = $this->getStaticValidations()->validationMessages;

        $dynamicValidationRules = $this->getDynamicValidations($id)->validationRules;
        $dynamicValidationMessages = $this->getDynamicValidations($id)->validationRules;;
        
        $validations = array_merge($staticValidationRules,$dynamicValidationRules);
        $validationMessages = array_merge($staticValidationMessages,$dynamicValidationMessages);

        $request->validate($validations, $validationMessages);

        if($request->get('action') == 'save')
        {
            return redirect(route('faq.inquiry',['id'=>$id]))
            ->with('message', Lang::get('inquiry_form_saved_message'))
            ->withCookie(cookie('enq_form_'.$id, json_encode($request->all()), 1440));
        }
        elseif($request->get('action') == 'submit')
        {

            $isKubotaUser = strlen(authUser()->guid) == config('constants.kubota_user_guid_length');

            $faqArticle = FaqData::find($id);
            if ($isKubotaUser)
            {
                $affiliations = $this->organization->getUserAffiliations($userInfo['email']);
            }
            else
            {
                $affiliations = IndSalesCorps::find($userInfo['company_id']);
            }
            
            $form = InquiryForm::find($faqArticle->faqCategory->mail_form_id);
            $data = [
                'userInfo' => $userInfo,
                'faqArticle' => $faqArticle,
                'affiliations' => $affiliations,
                'form' => $form,
                'isKubotaUser' => $isKubotaUser,
                'formData' => $request->all()
            ];

            $attachment = $request->file('attachment');

            $sendEmail = Mail::send('user.faq.inquiry_email', $data, function ($message) use ($data, $attachment) {
                $message->to($data["form"]->to_addr)
                    ->subject($data["form"]->en_subject);
                $message->attach($attachment->getRealPath(), [
                    'as' => $attachment->getClientOriginalName()
                ]);
            });

            if($sendEmail)
            {
                return redirect(route('user.faq.list'))->with('message', Lang::get('inquiry_email_sent_success_message'));
            }
            else
            {
                return redirect(route('faq.inquiry',['id'=>$id]))
                ->with('error', Lang::get('inquiry_form_saved_message'))
                ->withCookie(cookie('enq_form_'.$id, json_encode($request->all()), 1440));
            }
        }
    }

    /**
     * Get validation rules and messages for static form fields
     * @return stdClass
     */
    private function getStaticValidations()
    {
        $maxFileSize = (int)str_replace( 'MB', '', config('constants.inquiry_from_upload_size_limit')) * 1024;

        $validationRules = [
            'email' => 'required|max:320|email',
            'subject' => 'required:max:120',
            'category' => 'required:max:100',
            'system' => 'required:max:100',
            'phone' => 'max:15|regex:/^[-+()0-9]+$/',
            'attachment' => 'max:' . $maxFileSize . '|mimes:' . config('constants.inquiry_form_mime_types')
        ];
        $replacements = [
            '{file_size}' => config('constants.inquiry_from_upload_size_limit'),
            '{file_types}' => config('constants.inquiry_form_mime_types'),
        ];

        $validationMessages = [
            'email.required' => Lang::get('email_required'),
            'email.max' => Lang::get('email_max_length'),
            'email.email' => Lang::get('invalid_email'),
            'subject.required' => Lang::get('subject_required'),
            'subject.max' => Lang::get('subject_max_length'),
            'category.required' => Lang::get('category_required'),
            'category.max' => Lang::get('category_max_length'),
            'system.required' => Lang::get('system_required'),
            'system.max' => Lang::get('system_max_length'),
            'phone.max' => Lang::get('phone_max_length'),
            'phone.regex' => Lang::get('invalid_phone'),
            'attachment.max' => str_replace(array_keys($replacements), array_values($replacements), Lang::get('attachment_max_size')),
            'attachment.mimes' => str_replace(array_keys($replacements), array_values($replacements), Lang::get('attachment_type_error')),
        ];

        $validations = new stdClass();
        $validations->validationRules = $validationRules;
        $validations->validationMessages = $validationMessages;

        return $validations;
    }

    /**
     * Get validation rules and messages for dynamic form fields
     * @return stdClass
     */
    private function getDynamicValidations($id)
    {
        $faqArticle = FaqData::find($id);
        $form = InquiryForm::find($faqArticle->faqCategory->mail_form_id);
        $language = app()->getLocale();
        $ja = config('constants.language_japanese');

        foreach($form->FormItems as $item)
        {
            $rule = '';
            $nameSlug = 'inq_' . Str::slug($item->en_item_name, '_');
            if($item->is_required)
            {
                $rule .= 'required';
                $requiredMessage = $language == $ja ? 'は必須項目です。' : $item->en_item_name . ' is required.';
                $validationMessages['inq_' . $nameSlug . '.required'] = $requiredMessage;
            }
            if($item->max_length)
            {
                $rule .= '|max:'.$item->max_length;
                $maxMessage = $language == $ja ? 'は' . $item->max_length . '文字以内で設定してください。' : $item->ja_item_name . ' must be within ' . $item->max_length . ' characters.';
                $validationMessages['inq_' . $nameSlug . '.max'] = $maxMessage;
            }

            if($item->item_type == 'email')
            {
                $rule .= '|email';
                $emailMessage = Lang::get('invalid_email');
                $validationMessages['inq_' . $nameSlug . '.email'] = $emailMessage;
            }
            if($item->item_type == 'phone')
            {
                $rule .= '|regex:/^[-+()]+$/';
                $phoneMessage = Lang::get('invalid_phone');
                $validationMessages['inq_' . $nameSlug . '.regex'] = $phoneMessage;
            }

            $validationRules['inq_' . $nameSlug] = $rule;
        }

        $validations = new stdClass();
        $validations->validationRules = $validationRules;
        $validations->validationMessages = $validationMessages;

        return $validations;
    }
}
