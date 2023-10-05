@extends('layouts.base')
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ </a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}#manage">管理画面</a></li>
                <li class="breadcrumb-item"><a href="{{ route('faq_article_list') }}">FAQ管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQカテゴリー覧</li>
            </ol>
        </nav>
        @include('layouts.navigation')
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
        FAQカテゴリー覧
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card mb-5">

                        <div class="card-body">

                            <div class="row  mb-3">

                                <div class="col-12">
                                    <button type="submit" class="faqCategoryBtn Btn btn btn-primary" title="新規カテゴリ追加" style="float: right;">新規カテゴリ追加
                                    </button>
                                </div>
                            </div>

                            <div class="modal fade" id="faqCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                @include('admin.faq_category.form_modal');
                            </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <table id="faqCategoryTable" class="table table-bordered text-nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="min-width:50px">ID</th>
                                                <th>システム(JP)</th>
                                                <th>カテゴリ名(JP)</th>
                                                <th>システム名(EN)</th>
                                                <th>カテゴリ名(EN)</th>
                                                <th>表示順</th>
                                                <th>状態(表示/非表示)</th>
                                                <th>フォームID</th>
                                            </tr>
                                        </thead>
                                    </table>
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
<script>
    var faqCatTable;
</script>
<script src="{{ asset('js/admin/faq_category.js') }}"></script>
@endsection
