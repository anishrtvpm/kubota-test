@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb gap-3 ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}#faq">{{ __('faq') }}</a></li>
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
                                            <input type="search" autofocus class="form-control border-1 px-2" placeholder="{{ __('enter_keywords')}}" tabindex="1" aria-label="Username" id="search_keyword">
                                            <a href="javascript:void(0);" tabindex="2" class="input-group-text keyword_btn" id="search-grid"><i class="fas fa-search"></i></a>
                                        </div>
                                    </div>
                                </form>
                                <form class="row row-cols-lg-auto g-3 align-items-center mb-5">
                                    <div class="col-12" >
                                        <label class="fw-bold"> {{ __('category_search') }}</label>
                                    </div>

                                   
                                    <div class="col-12 w-25">
                                        <select tabindex="3" class="form-select top_category" id="inlineFormSelectCatParent">
                                            <option value='' selected>{{ __('top_category')}}</option>
                                            @if(!empty($topCategories))
                                                @foreach($topCategories as $topCategory)
                                                    <option value="{{$topCategory->name}}">{{$topCategory->name}}</option>
                                                @endforeach
                                            @endif
                                            
                                        </select>
                                    </div>
                                    <div class="col-12 w-25">
                                        <select tabindex="4" class="form-select sub_category" id="inlineFormSelectCatChild">
                                            <option value='' selected>{{ __('sub_category')}}</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button tabindex="5" type="button" class="btn btn-primary searchBtn">{{ __('search') }}</button>
                                    </div>
                                    <div class="col-12">
                                        <button tabindex="6" type="button" class="btn btn-warning clear_btn">{{ __('clear') }}</button>
                                    </div>
                                </form>
                                <div class="faq_list_wrapper">
                                    
                                </div>
                                
                                <div class="d-grid gap-2 col-3 mx-auto mb-5">
                                    <a href="{{ route('faq_create') }}"><button tabindex="7" class="btn btn-warning btn-wave" type="button">{{ __('open_contact_form')}}</button></a>
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