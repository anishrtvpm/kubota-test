@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">ユーザーグループ権限情報管理</li>
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
        ユーザーグループ権限情報管理
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card mb-5">
                        <div class="card-body">
                            <form class="row">
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">ユーザーグループ</label>
                                    <div class="col-sm-7 mb-2">
                                        <select class="form-select" id="inlineFormSelectCatParent3">
                                            <option selected>グループ1</option>
                                            <option value="1">グループ2</option>
                                            <option value="2">グループ3</option>
                                            <option value="3">グループ4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">グループ名(JP)</label>
                                    <div class="col-sm-7 mb-2">
                                        <select class="form-select" id="inlineFormSelectCatParent3">
                                            <option selected>機械CF品質本部・国内事業所・研究開発部門</option>
                                            <option value="1">国内販社</option>
                                            <option value="2">海外事業所(K-QUIC利用あり)</option>
                                            <option value="3">海外事業所(K-QUIC利用なし)</option>
                                            <option value="4">M&A</option>
                                            <option value="5">独立系販社</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">グループ名(EN)</label>
                                    <div class="col-sm-7 mb-2">
                                        <select class="form-select" id="inlineFormSelectCatParent3">
                                            <option selected>Machinery CF Quality Division</option>
                                            <option value="1">Domestic sales company</option>
                                            <option value="2">Overseas offices (with K-QUIC)</option>
                                            <option value="3">Overseas office (without K-QUIC)</option>
                                            <option value="4">M&A</option>
                                            <option value="5">Independent sales company</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">グループ概要(JP)</label>
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
                                    <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label">グループ概要(EN)</label>
                                    <div class="col-sm-7 mb-2">
                                        <select class="form-select" id="inlineFormSelectCatParent3">
                                            <option selected>Machinery CF Quality Division Etc.</option>
                                            <option value="1">Domestic sales company</option>
                                            <option value="2">Overseas offices (with K-QUIC)</option>
                                            <option value="3">Overseas office (without K-QUIC)</option>
                                            <option value="4">M&A</option>
                                            <option value="5">Independent sales company</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-end">
                                    <div class="btn-list">
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-primary btn-wave px-4">新規グループ作成</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <b>グループ1のポータルメニュー制御情報</b>
                                <div class="row datatable_scroll">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>カテゴリ</th>
                                                <th>表示順</th>
                                                <th>システム名</th>
                                                <th>設定值</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>参照系</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                                <td>1</td>
                                                <td>クレーム全検索</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>表示</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>参照系</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                                <td>2</td>
                                                <td>販売型式検索</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>表示</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>参照系</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                                <td>3</td>
                                                <td>故障処置検索</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>表示</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>品質改善(受付）</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                                <td>1</td>
                                                <td>TSR （クレ速</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>表示</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>品質改善(受付）</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                                <td>2</td>
                                                <td>Flash Report</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>表示</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>品質改善(受付）</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                                <td>3</td>
                                                <td>OA案件管理</td>
                                                <td>
                                                    <select class="form-select" id="inlineFormSelectCatParent3">
                                                        <option selected>表示</option>
                                                        <option value="1">..</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12 text-end">
                                    <div class="btn-list">
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-danger btn-wave px-3">削除する</button></a>
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-warning btn-wave px-4">登録する</button></a>
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
