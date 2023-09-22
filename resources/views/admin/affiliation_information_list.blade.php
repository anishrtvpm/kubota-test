@extends('layouts.base')

@section('content')
<div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style2 mb-0">
            <li class="breadcrumb-item"><a href="javascript:void(0);">ポータルトップ</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0);">管理画面</a></li>
            <li class="breadcrumb-item active" aria-current="page">所属情報一覧</li>
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
    所属情報一覧
</div>

<div class="row">
    <div class="col-xxl-12 col-xl-12">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card mb-5">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 border">
                                    <form>
                                        <p>階層順で絞り込み</p>
                                        <div class="mb-2 mt-2">
                                            <select class="form-select" id="inlineFormSelectCatParent3">
                                                <option selected>Datalizer</option>
                                                <option value="1">Datalizer A</option>
                                                <option value="2">Datalizer B</option>
                                                <option value="3">Datalizer C</option>
                                            </select>
                                        </div>
                                        <div class="mb-2 mt-2">
                                            <select class="form-select" id="inlineFormSelectCatParent3">
                                                <option selected>Datalizer</option>
                                                <option value="1">Datalizer A</option>
                                                <option value="2">Datalizer B</option>
                                                <option value="3">Datalizer C</option>
                                            </select>
                                        </div>
                                        <div class="mb-2 mt-2">
                                            <select class="form-select" id="inlineFormSelectCatParent3">
                                                <option selected>Datalizer</option>
                                                <option value="1">Datalizer A</option>
                                                <option value="2">Datalizer B</option>
                                                <option value="3">Datalizer C</option>
                                            </select>
                                        </div>
                                        <div class="mb-5 mt-2">
                                            <select class="form-select" id="inlineFormSelectCatParent3">
                                                <option selected>Datalizer</option>
                                                <option value="1">Datalizer A</option>
                                                <option value="2">Datalizer B</option>
                                                <option value="3">Datalizer C</option>
                                            </select>
                                        </div>
                                        <p>会社名+キーワードで検索</p>
                                        <div class="mb-2 mt-2">
                                            <select class="form-select" id="inlineFormSelectCatParent3">
                                                <option selected>Datalizer</option>
                                                <option value="1">Datalizer A</option>
                                                <option value="2">Datalizer B</option>
                                                <option value="3">Datalizer C</option>
                                            </select>
                                        </div>
                                        <div class="mb-2 mt-2">
                                            <input type="text" class="form-control" id="input-email1"
                                                placeholder="検索キーワードを入力">
                                        </div>
                                        <div class="gap-2 col-6 mx-auto mb-7">
                                            <button class="btn btn-info px-4 mb-3 " style="float:right;margin-right: -64px;" type="button">検索</button>
                                        </div><br>
                                        <a class="mt-7" href="javascript:void(0)">所属情報をxlsファイルでダウンロード</a>
                                    </form>
                                </div>

                                <div class="col-md-7 " style="margin-left: 23px;">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap"   style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>コード</th>
                                                <th>所属名(JP)</th>
                                                <th>所属名(EN)</th>
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

                                <div class="col-auto mb-5 right" style="margin-left: 528px;">
                                    <div class="form-check  d-inline-block">
                                        <input class="form-check-input" type="checkbox" value="" id="checkebox-lg">
                                        <label class="form-check-label" for="checkebox-lg">下位組織を更新</label>
                                    </div>
                                    <button class="btn btn-warning px-4 me-2" type="button">投稿する</button>
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