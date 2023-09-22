@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">ホーム </a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">システムリンク管理</li>
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
      システムリンク管理
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card mb-5">

                        <div class="card-body">

                            <div class="row  mb-3">
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8" style="float: right;">新規追加</button>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="modaldemo8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">システムリンク追加</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <div class="row">
                                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">No</label>
                                                <div class="col-sm-8">
                                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">999999</label>
                                                </div>
                                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">カテゴリ</label>
                                                <div class="col-sm-8">
                                                    <input type="" class="form-control form-control-lg" id="colFormLabelLg" placeholder="カテゴリ">
                                                </div>
                                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">表示順</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-lg" id="colFormLabelLg" placeholder="0">
                                                </div>
                                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">タイトル(JP)</label>
                                                <div class="col-sm-8">
                                                    <input type="" class="form-control form-control-lg" id="colFormLabelLg" placeholder="タイトル(JP)">
                                                </div>
                                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">タイトル(EN)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="タイトル(EN)">
                                                </div>
                                               
                                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">URL(JP)</label>
                                                <div class="col-sm-8">
                                                    <input type="" class="form-control form-control-lg" id="colFormLabelLg" placeholder="URL(JP)">
                                                </div>
                                                <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">URL(EN)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" placeholder="URL(JP)" >
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-warning">投稿する</button>
                                            <button class="btn btn-danger">削除する</button>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>カテゴリ</th>
                                                <th>表示順</th>
                                                <th>システム名(JP)</th>
                                                <th>システム名（EN)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">1234567890</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">2345678900</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">3456789010</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">4567890120</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">5678901230</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">6789012340</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">1111111111</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">2222222222</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">3333333333</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">4444444444</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">5555555555</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">6666666666</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">7777777777</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">8888888888</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
                                            </tr>
                                            <tr>
                                                <td><a class="modal-effect" data-bs-effect="effect-scale" data-bs-toggle="modal" href="#modaldemo8">9999999999</a></td>
                                                <td>申請フフォーマット</td>
                                                <td><a href="#" target="_blank">●●●●●●●●●申請書</a></td>
                                                <td><a href="#" target="_blank"><i class="bi bi-file-earmark-pdf-fill fs-18 btn-outline-danger"></i>PDFファイル</a></td>
                                                <td>概要説明をここに表示</td>
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
         