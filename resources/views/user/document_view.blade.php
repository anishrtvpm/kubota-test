@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="javascript:void(0);">ホーム</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">文書</a></li>
                <li class="breadcrumb-item active" aria-current="page">No.111111111</li>
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
        文書No.111111111
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="mb-5">
                                    <div class="row">
                                        <h6>ファイル情報</h6>
                                        <label class="col-sm-2 col-form-label col-form-label">No</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-2 col-form-label col-form-label">11122233</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">カテゴリ</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-2 col-form-label col-form-label">申請フォーマット</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">ファイル名</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-4 col-form-label col-form-label">●●●●●●●●●申請書</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">概要</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-8 col-form-label col-form-label">概要説明をここに表示概要説明をここに表示概要説明をここに表示概要説明をここに表示概要説明をここに表示概要説明をここに表示概要説明をここに表示</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">ファイルタイプ</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-4 col-form-label col-form-label">PDF</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">ファイルサイズ</label>
                                        <div class="col-sm-10 mb-2">
                                            <label class="col-sm-4 col-form-label col-form-label">163KB(16299バイト)</label>
                                        </div>
                                        <label class="col-sm-2 col-form-label col-form-label">登録日</label>
                                        <div class="col-sm-10 mb-3">
                                            <label class="col-sm-4 col-form-label col-form-label">2023/10/10</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-2 col-3 mx-auto mb-5">
                                    <button class="btn btn-primary px-4 me-3" type="button">ダウンロード</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
         