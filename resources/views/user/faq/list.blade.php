@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('home') }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('faq') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('faq_list') }}</li>
            </ol>
        </nav>
        @include('layouts.navigation')
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
    {{ __('faq_list') }}
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header  justify-content-between">
                                <div class="card-title">
                                {{ __('faq_list') }}
                                </div>
                            </div>
                            <div class="card-body text-end">
                                <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                                    <div class="col-12 w-10">
                                        <label class="fw-bold"> {{ __('keyword_search')}}</label>
                                    </div>
                                    <div class="col-12 w-50">
                                        <div class="input-group">
                                            <input type="search" class="form-control border-1 px-2" placeholder="{{ __('enter_keywords')}}" aria-label="Username" id="search_keyword">
                                            <a href="javascript:void(0);" class="input-group-text keyword_btn" id="search-grid"><i class="fas fa-search"></i></a>
                                        </div>
                                    </div>
                                </form>
                                <form class="row row-cols-lg-auto g-3 align-items-center mb-5">
                                    <div class="col-12">
                                        <label class="fw-bold"> {{ __('category_search') }}</label>
                                    </div>

                                   
                                    <div class="col-12 w-25">
                                        <select class="form-select top_category" id="inlineFormSelectCatParent">
                                            <option selected>Select</option>
                                            
                                            @if(!empty($faqCategory))
                                                @foreach($faqCategory['mainCategory'] as $mainCategory)
                                                    <option value="{{$mainCategory['category_id']}}">{{$mainCategory['topCategory']}}</option>
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                    </div>
                                    <div class="col-12 w-25">
                                        <select class="form-select sub_category" id="inlineFormSelectCatChild">
                                            <option selected>Select</option>
                                            @if(!empty($faqCategory))
                                                @foreach($faqCategory['subCategory'] as $subCategory)
                                                    <option value="{{$subCategory['category_id']}}">{{$subCategory['subCategory']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary">{{ __('search') }}</button>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-warning clear_btn">{{ __('clear') }}</button>
                                    </div>
                                </form>
                                <div class="faq_list_wrapper">
                                    
                                </div>
                                
                                <div class="d-grid gap-2 col-3 mx-auto mb-5">
                                    <a href="{{ route('faq_create') }}"><button class="btn btn-warning btn-wave" type="button">{{ __('open_contact_form')}}</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
<script src="{{ asset('js/user/faq.js') }}"></script>
@endsection