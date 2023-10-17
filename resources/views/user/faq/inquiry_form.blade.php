@extends('layouts.base')
@section('content')
<script>
    var formItems = <?php echo $form->formItems->toJson(); ?>
</script>
@php
    if($userInfo['language'] == config('constants.language_japanese'))
    {
        $langIndex = 0;
        $system = $faqArticle->faqCategory->top_category_ja_name;
        $category = $faqArticle->faqCategory->sub_category_ja_name;
        $subject = $form->ja_subject;
    }
    else
    {
        $langIndex = 1;
        $system = $faqArticle->faqCategory->top_category_en_name;
        $category = $faqArticle->faqCategory->sub_category_en_name;
        $subject = $form->en_subject;
    }
    $isSaved = false;

    if(Cookie::has('enq_form_' . $faqArticle->faq_id))
    {
        $isSaved = true;
        $savedData = json_decode(Cookie::get('enq_form_' . $faqArticle->faq_id));
    }
@endphp

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}#manage">{{ __('faq') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('faq.list') }}">{{ __('faq_list') }}</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('faq.detail', ['id' => $faqArticle->faq_id]) }}">
                        {{ __('faq_no') }} {{ $faqArticle->faq_id }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('inquiry') }}</li>
            </ol>
        </nav>
        @include('layouts.navigation')
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
        {{ __('inquiry') }}
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <form method="POST" id="faqInquiryForm" action="{{ route('faq.inquiry.confirm', ['id' => $faqArticle->faq_id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="align-items-center justify-content-between mb-4">
                                        <p class="text-muted faq-list pt-0">
                                            {{ __('faq_no') }} {{ $faqArticle->faq_id }} 
                                            <a href="{{ route('faq.detail', ['id' => $faqArticle->faq_id]) }}" class="link">
                                                {{ $faqArticle->title }}
                                            </a>
                                            {{ __('inquiry_form_title') }}
                                        </p>
                                        <p class="preview-hidden">
                                            <span class="must-text">{{ __('must') }}</span>{{ __('items_are_required') }}
                                        </p>
                                    </div>

                                    <div class="row mb-5">
                                        <h6 class="mb-2 fw-bold">{{ __('user_information') }}</h6>
                                        <label class="col-sm-2 col-form-label">
                                            {{ $isKubotaUser ? __('guid') : __('id') }}
                                        </label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label col-form-label">
                                                {{ $userInfo['guid'] }}
                                            </label>
                                        </div>
                                        <label class="col-sm-2  col-form-label">
                                            {{ $isKubotaUser ? __('employee_name') :  __('name')}}
                                        </label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-10 col-form-label">
                                                {{ getUsername() }}
                                            </label>
                                        </div>
                                        <label class="col-sm-2  col-form-label">
                                            {{ $isKubotaUser ? __('affiliation') :  __('company')}}
                                        </label>
                                        <div class="col-sm-10 mb-2">
                                            @if ($isKubotaUser)
                                                @if ($affiliations->count() > 1)
                                                    <select class="form-select preview-hidden" id="affiliationDropdown" name="affiliation">
                                                        @foreach ($affiliations as $affilition)
                                                            <option value="{{ $affilition->section_name }}"
                                                                @if ($affilition->primary_flag == 1 || ($isSaved && $savedData->affiliation == $affilition->section_name)) selected @endif
                                                                >
                                                                {{ $affilition->section_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="col-form-label preview-visible affiliation-selection"></label>
                                                @else
                                                <input type="text" class="form-control preview-hidden" id="input-affiliation"
                                                    name="affiliation"
                                                    value="{{ $affiliations->first()->section_name }}" readonly>
                                                    <label class="col-form-label preview-visible">{{ $affiliations->first()->section_name }}</label>
                                                @endif
                                            @else
                                                <input type="text" class="form-control preview-hidden" id="input-affiliation"
                                                    name="affiliation"
                                                    value="{{ $affiliations->company_name }}" readonly>
                                                    <label class="col-form-label preview-visible">{{ $affiliations->company_name }}</label>
                                            @endif
                                        </div>
                                        <label class="col-sm-2 col-form-label">{{ __('language') }}</label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control preview-hidden" id="input-affiliation"
                                                    name="language"
                                                    value="{{ $userInfo['language'] == config('constants.language_japanese') ? '日本語' : 'English' }}"
                                                    readonly>
                                            <label class="col-form-label preview-visible">
                                                {{ $userInfo['language'] == config('constants.language_japanese') ? '日本語' : 'English' }}
                                            </label>
                                        </div>
                                        <label class="col-sm-2 col-form-label">
                                            {{ __('email_address') }}
                                            <span class="must preview-hidden">{{ __('must') }}</span>
                                        </label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="email" class="form-control preview-hidden" id="input-email"
                                                value="{{ $isSaved ? $savedData->email : $userInfo['email'] }}"
                                                name="email">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <label class="col-form-label preview-visible user-email"></label>
                                        </div>
                                        <label class="col-sm-2 col-form-label">
                                            {{ __('phone_number') }}
                                        </label>
                                        <div class="col-sm-10 mb-4">
                                            <input type="tel" class="form-control preview-hidden" id="input-phone" 
                                            name="phone" value="{{ $isSaved ? $savedData->phone : '' }}">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="col-form-label preview-visible user-phone"></label>
                                        </div>

                                        <h6 class="mb-2 fw-bold">{{ __('inquiry_details') }}</h6>
                                        <label class="col-sm-2 col-form-label">{{ __('system') }}<span
                                                class="must preview-hidden">{{ __('must') }}</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control preview-hidden" id="input-system"
                                                value="{{ $system }}" name="system" readonly>
                                            @error('system')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="col-form-label preview-visible">{{ $system }}</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label">{{ __('category') }}<span
                                                class="must preview-hidden">{{ __('must') }}</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control preview-hidden" id="input-system"
                                                value="{{ $category }}" name="category" readonly>
                                            @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="col-form-label preview-visible">{{ $category }}</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label">{{ __('subject') }}<span
                                                class="must preview-hidden">{{ __('must') }}</span></label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control preview-hidden" id="input-field1" 
                                            name="subject" value="{{ $subject  }}" readonly>
                                            @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="col-form-label preview-visible">{{ $subject }}</label>
                                        </div>

                                        @foreach ($form->formItems as $formItem)
                                            @php
                                                $nameSlug = 'inq_' . Str::slug($formItem->en_item_name, '_');
                                            @endphp
                                            <label class="col-sm-2 col-form-label">
                                                {{ $userInfo['language'] == config('constants.language_japanese') ? $formItem->ja_item_name : $formItem->en_item_name }}
                                                @if ($formItem->is_required)
                                                    <span class="must preview-hidden">{{ __('must') }}</span>
                                                @endif
                                            </label>
                                            <div class="col-sm-10 mb-2">
                                                <label class="col-form-label preview-visible {{ $nameSlug }}"></label>
                                            @switch($formItem->item_type)
                                                @case('single_line')
                                                @case('phone')
                                                @case('email')
                                                    <input class="form-control preview-hidden"
                                                    type="{{ $fieldTypes[$formItem->item_type] }}"
                                                    maxlength="{{ $formItem->max_length }}"
                                                    name="{{ $nameSlug }}"
                                                    value="{{ $isSaved ? $savedData->$nameSlug : ''}}"
                                                    >
                                                    @error($nameSlug)
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                @break
                                                @case('multi_line')
                                                    <textarea class="form-control preview-hidden" rows="7"
                                                    maxlength="{{ $formItem->max_length }}"
                                                    name="{{ $nameSlug }}"
                                                    >{{ $isSaved ? $savedData->$nameSlug : ''}}</textarea>
                                                    @error($nameSlug)
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                @break
                                                @case('select')
                                                    <select class="form-select preview-hidden" id="inlineFormSelectCatParent" name="{{ $nameSlug }}">
                                                        @foreach (explode(",", $formItem->select_item) as $option )
                                                            @php
                                                                $optionName = explode("|", $option)[$langIndex];
                                                            @endphp
                                                            <option value="{{ explode("|", $option)[$langIndex] }}"
                                                            @if ($isSaved && $savedData->$nameSlug == $optionName) selected @endif
                                                            >{{ $optionName }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error($nameSlug)
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                @break
                                            @endswitch
                                            </div>
                                        @endforeach

                                        <label for="formFile" class="col-sm-2 col-form-label preview-hidden">
                                            {{ __('attachment') }}
                                        </label>
                                        <div class="col-sm-10 preview-hidden">
                                            <input class="form-control" type="file" id="formFile" name="attachment">
                                            @error('attachment')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="col-12 text-center preview-hidden">
                                        <button class="btn btn-primary px-4 me-3" type="submit" name="action"
                                            value="save">{{ __('save_once') }}</button>
                                        <button class="btn btn-warning px-4" type="submit" name="action"
                                            value="confirm">{{ __('confirmation_screen') }}</button>
                                    </div>
                                    <div class="col-12 text-center preview-visible">
                                        <a class="btn btn-primary px-4 me-3 close-preview">{{ __('back') }}</a>
                                        <button class="btn btn-warning px-4 submit-inquiry" type="submit" name="action"
                                            value="submit">{{ __('submit') }}</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/admin/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/user/faq_inquiry_form.js') }}"></script>
@endsection
