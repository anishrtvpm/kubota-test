@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">ホーム</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">FAQ管理</li>
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
        FAQ記事一覧
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <form class="row">
                                <div class="col-md-4 row mb-3">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">大カテゴリ</label>
                                    <div class="col-sm-8">
                                        <select id="inputState1" class="form-select">
                                            <option selected>Datalizer</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">中カテゴリ</label>
                                    <div class="col-sm-8">
                                        <select id="inputState1" class="form-select">
                                            <option selected>Datalizer</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3 me-1">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">言語</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" id="inlineFormSelectCatParent1">
                                            <option selected>日本語</option>
                                            <option value="1">日本語</option>
                                            <option value="2">英語</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3 me-1">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">キーワード</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input-keyword" placeholder="キーワードを入力">
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3">
                                    <label for="text-area" class="col-sm-3 col-form-label">状態</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" id="inlineFormSelectCatParent5">
                                            <option selected>公開中</option>
                                            <option value="1">未公開</option>
                                            <option value="2">保留中</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 row mb-3">
                                    <a href="javascript:void(0);"><button type="button" class="btn btn-primary btn-wave px-4">検索</button></a>
                                </div>
                                <div class="col-md-12 text-end">
                                    <div class="btn-list">
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-primary btn-wave px-4">カテゴリ管理</button></a>
                                        <a href="{{ route('faq_edit') }}"><button type="button" class="btn btn-warning btn-wave px-3">新規FAQ作成</button></a>
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
                                <div class="row datatable_scroll">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>言語</th>
                                                <th>システム</th>
                                                <th>中カテゴリ</th>
                                                <th>並び順</th>
                                                <th>タイトル</th>
                                                <th>状態</th>
                                                <th>質問日</th>
                                                <th>回答日</th>
                                                <th>回答者</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="{{ route('faq_edit') }}">12345678</a></td>
                                                <td>日本語</td>
                                                <td>Datalizer</td>
                                                <td>Datalizer</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>公開中</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                                <td>山田太郎</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('faq_edit') }}">12345678</a></td>
                                                <td>日本語</td>
                                                <td>Datalizer</td>
                                                <td>Datalizer</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>公開中</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                                <td>山田太郎</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('faq_edit') }}">12345678</a></td>
                                                <td>日本語</td>
                                                <td>Datalizer</td>
                                                <td>Datalizer</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>公開中</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                                <td>山田太郎</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('faq_edit') }}">12345678</a></td>
                                                <td>日本語</td>
                                                <td>Datalizer</td>
                                                <td>Datalizer</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>公開中</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                                <td>山田太郎</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('faq_edit') }}">12345678</a></td>
                                                <td>日本語</td>
                                                <td>Datalizer</td>
                                                <td>Datalizer</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>公開中</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                                <td>山田太郎</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('faq_edit') }}">12345678</a></td>
                                                <td>日本語</td>
                                                <td>Datalizer</td>
                                                <td>Datalizer</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>公開中</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                                <td>山田太郎</td>
                                            </tr>
                                            <tr>
                                                <td><a href="{{ route('faq_edit') }}">12345678</a></td>
                                                <td>日本語</td>
                                                <td>Datalizer</td>
                                                <td>Datalizer</td>
                                                <td>1</td>
                                                <td>テストタイトル</td>
                                                <td>公開中</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                                <td>山田太郎</td>
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
