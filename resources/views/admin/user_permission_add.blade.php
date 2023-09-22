@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">ホーム</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">管理画面</a></li>
                <li class="breadcrumb-item"><a href="{{ route('faq_article_list') }}">ユーザー情報ー覧</a></li>
                <li class="breadcrumb-item active" aria-current="page">ユーザー情報</li>
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
        ユーザー情報
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card mb-5">
                        <div class="card-body">
                            <form class="row">
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">ユーザID(GUID)</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="1111111111" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">会社</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="クボタ" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">所属コード</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="1111111111-01" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">所属</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="テスト" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">アドレス帳組織</label>
                                    <div class="col-sm-6 mb-2">
                                    クボタエイトサービス>クボタエイトサービス>西日本営業本部
                                    >アドコムサービス部>システムデヴェロップメントセンター
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">ユーザー名(JP)</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="テスト名" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">ユーザー名(EN)</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="Test name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">メールアドレス</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="test@kubota.com" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">有効期間開始日</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="2023/10/10" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">有効期間終了日</label>
                                    <div class="col-sm-6 mb-2">
                                        <input type="text" class="form-control" id="input-text" value="2023/10/10" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">表示言語</label>
                                    <div class="col-sm-7 mb-2">
                                        <select class="form-select" id="inlineFormSelectCatParent3">
                                            <option selected>JP:日本語</option>
                                            <option value="1">EN:英語</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">特別権限設定</label>
                                    <div class="col-sm-7 mb-2">
                                        <select class="form-select" id="inlineFormSelectCatParent3">
                                            <option selected>機械CF品質本部・国内事業所・研究開発部門など</option>
                                            <option value="1">国内販社</option>
                                            <option value="2">海外事業所(K-QUIC利用あり)</option>
                                            <option value="3">海外事業所(K-QUIC利用なし)</option>
                                            <option value="4">M&A</option>
                                            <option value="5">独立系販社</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">管理者権限</label>
                                    <div class="col-sm-7 mb-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" checked>
                                    </div>
                                </div>
                                <div class="col-md-12 text-end">
                                    <div class="btn-list">
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-danger btn-wave px-3">削除する</button></a>
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-warning btn-wave px-4">登録する</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
