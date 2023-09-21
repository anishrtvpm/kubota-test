@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">ホーム</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">文書</a></li>
                <li class="breadcrumb-item active" aria-current="page">文書一覧</li>
            </ol>
        </nav>
        <form class="row row-cols-lg-auto g-3 align-items-center">
            <div class="col-12">
                <label class="fw-bold">クイックナビ</label>
            </div>
            <div class="col-12">
                <select class="form-select" id="inlineFormSelectPref">
                    <option selected value="1">申請フォーマット・テンプレート等一覧</option>
                    <option value="2">各種リンク</option>
                    <option value="3">FAQ一覧</option>
                    <option value="4">お知らせ</option>
                    <option value="5">基幹システム(文書管理)</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Go</button>
            </div>
        </form>
    </div>
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
        文書一覧
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card mb-5">
                        <div class="card-header  justify-content-between">
                            <div class="card-title">
                                文書一覧
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                                <div class="col-12 w-25">
                                    <select class="form-select" id="inlineFormSelectCatParent">
                                        <option selected>大カテゴリ</option>
                                        <option value="1">大カテゴリ０１</option>
                                        <option value="2">大カテゴリ０２</option>
                                        <option value="3">大カテゴリ０３</option>
                                    </select>
                                </div>
                                <div class="col-12 w-25">
                                    <select class="form-select" id="inlineFormSelectCatChild">
                                        <option selected>小カテゴリ</option>
                                        <option value="1">小カテゴリ０１</option>
                                        <option value="2">小カテゴリ０２</option>
                                        <option value="3">小カテゴリ０３</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">検索</button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xl-12">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>カテゴリ</th>
                                                <th>名称</th>
                                                <th>名称</th>
                                                <th>概要</th>
                                                <th>登録日</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="{{ route('document_view') }}">1234567890</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('document_view') }}">12212112</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('document_view') }}">11111111</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('document_view') }}">1234567890</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('document_view') }}">1234567890</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">6789012340</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">1111111111</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">2222222222</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">3333333333</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">4444444444</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">5555555555</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">6666666666</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">7777777777</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">8888888888</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">9999999999</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                        </tbody>
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
         