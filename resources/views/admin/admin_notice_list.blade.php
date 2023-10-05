@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">お知らせ管理</li>
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
        お知らせ一覧
    </div>

    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <a href="{{ route('notice_edit') }}"><button type="button" class="btn btn-primary btn-wave px-4">新規追加</button></a>
                                <div class="col-md-6 row mb-3">
                                </div>
                                <div class="row datatable_scroll">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>システム</th>
                                                <th>表示順</th>
                                                <th>タイトル</th>
                                                <th>配送先グループ</th>
                                                <th>掲載開始</th>
                                                <th>掲載終了</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="{{ route('notice_edit') }}">999999999</a></td>
                                                <td>テストシステム</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>独立系販社</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('notice_edit') }}">999999999</a></td>
                                                <td>テストシステム</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>M&A</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('notice_edit') }}">999999999</a></td>
                                                <td>テストシステム</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>国内販社</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('notice_edit') }}">999999999</a></td>
                                                <td>テストシステム</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>海外事業所(K-QUIC利用あり)</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('notice_edit') }}">999999999</a></td>
                                                <td>テストシステム</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>海外事業所(K-QUIC利用なし)</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('notice_edit') }}">999999999</a></td>
                                                <td>テストシステム</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>海外事業所(K-QUIC利用あり)</td>
                                                <td>2023/05/29</td>
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
</div>
@endsection
