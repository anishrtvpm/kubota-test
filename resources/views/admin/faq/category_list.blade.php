@extends('layouts.base')
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">ポータルトップ </a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">管理画面</a></li>
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
                                    <button type="submit" class="btn btn-primary"data-bs-effect="effect-scale"
                                        data-bs-toggle="modal" href="#modaldemo8" style="float: right;">新規カテゴリ追加</button>
                                </div>
                            </div>

                            <div class="modal fade" id="modaldemo8" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">FAQカテゴリ追加</h6><button aria-label="Close"
                                                class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <div class="row">
                                                <label for="colFormLabelLg"
                                                    class="col-sm-4 col-form-label col-form-label">ID</label>
                                                <div class="col-sm-8">
                                                    <label for="colFormLabelLg"
                                                        class="col-sm-4 col-form-label col-form-label">999999</label>
                                                </div>
                                                <label for="colFormLabelLg"
                                                    class="col-sm-4 col-form-label col-form-label">システム(JP)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="colFormLabelLg" placeholder="システム(JP)">
                                                </div>
                                                <label for="colFormLabelLg"
                                                    class="col-sm-4 col-form-label col-form-label">カテゴリ名(JP)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="colFormLabelLg" placeholder="カテゴリ名(JP)">
                                                </div>
                                                <label for="colFormLabelLg"
                                                    class="col-sm-4 col-form-label col-form-label">システム(EN)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-lg"
                                                        id="colFormLabelLg" placeholder="システム(EN)">
                                                </div>
                                                <label for="colFormLabelLg"
                                                    class="col-sm-4 col-form-label col-form-label">カテゴリ名(EN)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="カテゴリ名(EN)">
                                                </div>

                                                <label for="colFormLabelLg"
                                                    class="col-sm-4 col-form-label col-form-label">表示順</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-lg"
                                                        id="colFormLabelLg" placeholder="0">
                                                </div>
                                                <label for="colFormLabelLg"
                                                    class="col-sm-4 col-form-label col-form-label">状態</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-lg">
                                                        <option>Select</option>
                                                        <option></option>
                                                    </select>
                                                </div>
                                                <label for="colFormLabelLg"
                                                    class="col-sm-4 col-form-label col-form-label">フォームID</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-lg"
                                                        id="colFormLabelLg" placeholder="0">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-warning">追加する</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <table id="faqCategoryTable" class="table table-bordered text-nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
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
    <script src="{{ asset('js/admin/faq.js') }}"></script>
@endsection
