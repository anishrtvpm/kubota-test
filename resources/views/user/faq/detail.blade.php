@extends('layouts.base')
@section('content')
    <?php
    $language = app()->getLocale();
    $topCategoryfield = 'top_category_' . $language . '_name';
    $subCategoryfield = 'sub_category_' . $language . '_name';
    $faqData=$faqData[0];
    ?>
    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ __('home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}#manage">{{ __('faq') }}</a></li>
                <li class="breadcrumb-item"><a href="{{route('faq.list')}}">{{ __('faq_list') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ No.{{$faqData->faq_id}}</li>
            </ol>
        </nav>
        @include('layouts.navigation')
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
        FAQ No.{{$faqData->faq_id}}
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            @if(session('error'))
                            <div class="alert alert-danger mt-2" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between ms-4 mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="faq-cat">
                                            {{__('category')}}
                                        </div>
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-style2 mb-0">
                                                <li class="breadcrumb-item"><a href="{{ route('faq.list') }}?topcategory={{$faqData->$topCategoryfield}}">{{$faqData->$topCategoryfield}}</a></li>
                                                <li class="breadcrumb-item"><a href="{{ route('faq.list') }}?topcategory={{$faqData->$topCategoryfield}}&subcategory={{$faqData->category_id}}">{{$faqData->$subCategoryfield}}</a></li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="float-end fs-14 text-muted">
                                        <span class="faq-number">{{__('faq_number')}}:{{$faqData->faq_id}}</span>
                                        <span class="d-block question-date">{{__('question_date')}}:{{  dateFormat($faqData->question_date,config('constants.date_format_ymd')) }}</span>
                                        <span class="d-block answer-date">{{__('answer_date')}}:{{dateFormat($faqData->answer_date,config('constants.date_format_ymd'))}}</span>
                                        <span class="d-block faq-responden">{{__('responder')}}:{{$faqData->responder}}</span>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-question.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">{{$faqData->title}}</h6>
                                                <p class=" text-muted">{{$faqData->q_message}}</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-answer.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">{{__('answer')}}</h6>
                                                <p class=" text-muted">{{$faqData->a_message}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-picture.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">{{__('references')}}</h6>

                                            </div>

                                        </div>
                                        <div class="text-center">
                                            <img src="{{ asset('images/media/media-48.jpg') }}" class="img-fluid" alt="...">
                                            <img src="{{ asset('images/media/media-48.jpg') }}" class="img-fluid" alt="...">
                                            <img src="{{ asset('images/media/media-48.jpg') }}" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-link.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">{{__('reference_url')}}</h6>
                                                <ul>
                                                    <li class="text-muted"><a href="{{$faqData->reference_url}}" target="_blank">{{$faqData->reference_url}}</a></li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 faq-list">
                                        <div class="d-flex">
                                            <span>
                                                <img src="{{ asset('images/extra/faq-email.png') }}" width="32" height="32" class="img-fluid" alt="...">
                                            </span>
                                            <div class="ms-2">
                                                <h6 class="fw-semibold mb-2 mt-2">{{__('feedback_question_form')}}</h6>
                                                <p class="text-muted">{{__('feedback_question_form_text')}}</p>
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 col-4 mx-auto mb-2">
                                            <a href="{{ route('faq_create') }}"><button class="btn btn-warning btn-wave" type="button">{{__('open_contact_form')}}</button></a>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
         