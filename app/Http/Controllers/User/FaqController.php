<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FaqArticle;
use App\Models\FaqCategory;
use App\Models\FaqData;
use App\Models\IndSalesCorps;
use App\Models\InquiryForm;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use stdClass;


class FaqController extends Controller
{
    private $faqCategory;
    private $faqArticle;
    private $organization;
    public function __construct(
        FaqCategory $faqCategory,
        FaqArticle $faqArticle,
        Organization $organization
    ) {
        $this->middleware('auth');
        $this->faqCategory = $faqCategory;
        $this->faqArticle = $faqArticle;
        $this->organization = $organization;
    }
    public function index()
    {
        $faqCategory = $this->faqCategory->getFaqCategory();
        return view('user.faq.list')->with([
            'faqCategory' => $faqCategory,
        ]);
    }

    public function getFaqList(Request $request)
    {
        $faqData=$this->faqArticle->getFaqList($request);
        return view('user.faq.ajax_list')->with(['faqData' => $faqData]);
    }

    public function getInquiryForm($id)
    {
        $userInfo = getUser(authUser()->guid);

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
        
        $form = InquiryForm::find($faqArticle->category->mail_form_id);
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
            $userInfo = getUser(authUser()->guid);

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
            
            $form = InquiryForm::find($faqArticle->category->mail_form_id);
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
                    ->subject($data["form"]->subject_en);
                $message->attach($attachment->getRealPath(), [
                    'as' => $attachment->getClientOriginalName()
                ]);
            });

            if($sendEmail)
            {
                return redirect(route('user.faq.list'))->with('message', Lang::get('inquiry_email_sent_success_message'));
            }
        }
    }


    private function getStaticValidations()
    {
        $language = app()->getLocale();
        $validationRules = [
            'email' => 'required|max:320|email',
            'subject' => 'required:max:120',
            'category' => 'required:max:100',
            'system' => 'required:max:100',
            'phone' => 'max:15'
        ];
        $validationMessages = [
            'email.required' => $language == config('constants.language_japanese') ? 'メールアドレスは必須項目です。' : 'Email is required.',
            'email.max' => $language == config('constants.language_japanese') ? 'メールアドレスは 320文字以内で設定してください。' : 'The e-mail address must be 320 characters or less.',
            'email.email' => $language == config('constants.language_japanese') ? '有効なEメールアドレスを入力してください。' : 'Please enter a valid email address',
            'subject.required' => $language == config('constants.language_japanese') ? '件名は必須項目です。' : 'Subject is a required field',
            'subject.max' => $language == config('constants.language_japanese') ? '件名は 120文字以内で設定してください。' : 'The subject must be within 100 characters.',
            'category.required' => $language == config('constants.language_japanese') ? 'カテゴリは必須項目です。' : 'Category is a required field.',
            'category.max' => $language == config('constants.language_japanese') ? 'カテゴリは 100文字以内で設定してください。' : 'The category must be within 100 characters.',
            'system.required' => $language == config('constants.language_japanese') ? 'システムは必須項目です。' : 'System is a required field.',
            'system.max' => $language == config('constants.language_japanese') ? 'システムは 100文字以内で設定してください。' : 'The system must be within 100 characters.'
        ];

        $validations = new stdClass();
        $validations->validationRules = $validationRules;
        $validations->validationMessages = $validationMessages;

        return $validations;
    }

    private function getDynamicValidations($id)
    {
        $faqArticle = FaqData::find($id);
        $form = InquiryForm::find($faqArticle->category->mail_form_id);
        $language = app()->getLocale();

        foreach($form->FormItems as $item)
        {
            $required = '';
            if($item->is_required)
            {
                $required = 'required';
                $requiredMessage = $language == config('constants.language_japanese') ? 'は必須項目です。' : $item->item_name_en . ' is required.';
                $validationMessages['inq_' . Str::slug($item->item_name_en, '_') . '.required'] = $requiredMessage;
            }
            
            $maxLength = '';
            if($item->max_length)
            {
                $maxLength = '|max:'.$item->max_length;
                $maxMessage = $language == config('constants.language_japanese') ? 'は' . $item->max_length . '文字以内で設定してください。' : $item->item_name_ja . ' must be within ' . $item->max_length . ' characters.';
                $validationMessages['inq_' . Str::slug($item->item_name_en, '_') . '.max'] = $maxMessage;
            }

            $validationRules['inq_' . Str::slug($item->item_name_en, '_')] = $required . $maxLength;
        }

        $validations = new stdClass();
        $validations->validationRules = $validationRules;
        $validations->validationMessages = $validationMessages;

        return $validations;
    }
}
