@extends('layouts.base')
@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">管理画面</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_notice_list') }}">お知らせ管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">お知らせ編集</li>
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
        お知らせ編集
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <form class="card-body">
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-md-6 row mb-3">
                                            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">表示順</label>
                                            <div class="col-sm-7 mb-2 me-1">
                                                <input type="number" class="form-control" id="input-number" placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6 row mb-3">
                                            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">システム</label>
                                            <div class="col-sm-7 mb-2">
                                                <select class="form-select" id="inlineFormSelectCatParent2">
                                                    <option selected>調査報告/再発防止報告</option>
                                                    <option value="1">調査報告/再発防止報告A</option>
                                                    <option value="2">調査報告/再発防止報告B</option>
                                                    <option value="3">調査報告/再発防止報告C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label">タイトル（JP）</label>
                                            <div class="col-sm-9 mb-2">
                                                <input type="text" class="form-control" id="input-text" placeholder="【ご注意】 G-QUICKの●●●について">
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <label for="text-area" class="col-sm-2 col-form-label col-form-label">メッセージ（JP）</label>
                                            <div class="col-sm-9 mb-2">
                                                <textarea class="form-control" id="text-area44" rows="1" style="height: 175px;" placeholder="メッセージを入力してください"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label">タイトル（EN）</label>
                                            <div class="col-sm-9 mb-2">
                                                <input type="text" class="form-control" id="input-text" placeholder="【ご注意】 G-QUICKの●●●について">
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <label for="text-area" class="col-sm-2 col-form-label col-form-label">メッセージ（EN）</label>
                                            <div class="col-sm-9 mb-2">
                                                <textarea class="form-control" id="text-area44" rows="1" style="height: 175px;" placeholder="メッセージを入力してください"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row mb-3">
                                            <label for="text-area" class="col-sm-2 col-form-label col-form-label">配信先</label>
                                            <div class="col-sm-9 mb-2">
                                                <div class="form-check form-check-lg d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkebox-lg1" checked="">
                                                    <label class="form-check-label me-5" for="checkebox-lg">
                                                        01:機械CF品質本部・国内事業所・研究開発部門
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="" id="checkebox-lg2">
                                                    <label class="form-check-label" for="checkebox-lg">
                                                        02:国内販社
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-lg d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkebox-lg3">
                                                    <label class="form-check-label me-5" for="checkebox-lg">
                                                        03:海外事業所(K-QUIC利用あり)
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="" id="checkebox-lg4">
                                                    <label class="form-check-label" for="checkebox-lg">
                                                        04:海外事業所(K-QUIC利用なし)
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-lg d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkebox-lg5">
                                                    <label class="form-check-label me-5" for="checkebox-lg">
                                                        05:M&A
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" value="" id="checkebox-lg6">
                                                    <label class="form-check-label" for="checkebox-lg">
                                                        06:独立系販社
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row mb-3">
                                            <label for="inputPassword3" class="col-sm-4 col-form-label">配信期間</label>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                        <input type="text" class="form-control flatpickr-input" id="daterange3" placeholder="Date range picker" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row mb-3"></div>
                                    </div>
                                </div>
                                <div class="gap-2 col-3 mx-auto mb-5">
                                    <button class="btn btn-danger px-4 me-3" type="button">削除する</button>
                                    <button class="btn btn-warning px-4" type="button">投稿する</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
