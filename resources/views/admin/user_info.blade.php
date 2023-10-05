@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">トップページ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">管理画面</a></li>
                <li class="breadcrumb-item active" aria-current="page">ユーザー情報一覧</li>
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
        ユーザー情報一覧
    </div>

    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <form class="row">
                                <div class="col-md-6 row mb-3">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">テーブル切替</label>
                                    <div class="col-sm-8">
                                        <select id="inputState1" class="form-select">
                                            <option selected>従業員所属情報</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                </div>
                                <div class="col-md-6 row mb-3 me-1">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">ユーザーID (GUID)</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="input1">
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">ユーザー名</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="input2">
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3 me-1">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">会社</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="input3">
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">所属</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="input4">
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3 me-1">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">有効開始日</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                <input type="text" class="form-control flatpickr-input" id="daterange1" placeholder="Date range picker" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">有効終了日</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                <input type="text" class="form-control flatpickr-input" id="daterange2" placeholder="Date range picker" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">ユーザーグループ</label>
                                    <div class="col-sm-8">
                                        <select id="inputState2" class="form-select">
                                            <option selected>従業員所属情報</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 row mb-3">
                                </div>
                                <div class="col-md-12 text-end">
                                    <div class="btn-list">
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-warning btn-wave px-3">新規登録</button></a>
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-primary btn-wave px-4">検索</button></a>
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-light btn-wave px-4">クリア</button><br></a>
                                        <a href="javascript:void(0);"><button type="button" class="btn btn-link btn-wave">ユーザーデータをExcelファイルに出力</button></a>
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
                                                <th>GUID</th>
                                                <th>区分</th>
                                                <th>ユーザー名(JP)</th>
                                                <th>ユーザー名(EN)</th>
                                                <th>メールアドレス</th>
                                                <th>所属(会社CD)</th>
                                                <th>所属(所属CD)</th>
                                                <th>所属(枝番)</th>
                                                <th>所属名</th>
                                                <th>ユーザーグループ</th>
                                                <th>有効開始日</th>
                                                <th>有効終了日</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>12345678</td>
                                                <td>管理者</td>
                                                <td>山田太郎</td>
                                                <td>Test Test</td>
                                                <td>test.test@kubota.com</td>
                                                <td>1111-12345678-01</td>
                                                <td>システム開発</td>
                                                <td>11111111111</td>
                                                <td>所属1</td>
                                                <td>グループ1</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td>11122233</td>
                                                <td>管理者</td>
                                                <td>山田太郎</td>
                                                <td>Test Test</td>
                                                <td>test.test@kubota.com</td>
                                                <td>1111-11122233-01</td>
                                                <td>システム開発</td>
                                                <td>11111111111</td>
                                                <td>所属2</td>
                                                <td>グループ2</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td>11112222</td>
                                                <td>一般</td>
                                                <td>山田太郎</td>
                                                <td>Test Test</td>
                                                <td>test.test@kubota.com</td>
                                                <td>1111-11112222-01</td>
                                                <td>システム開発</td>
                                                <td>11111111111</td>
                                                <td>所属2</td>
                                                <td>グループ3</td>
                                                <td>2023/05/29</td>
                                                <td>2023/05/29</td>
                                            </tr>
                                            <tr>
                                                <td>11112222</td>
                                                <td>一般</td>
                                                <td>山田太郎</td>
                                                <td>Test Test</td>
                                                <td>test.test@kubota.com</td>
                                                <td>1111-11111111-01</td>
                                                <td>システム開発</td>
                                                <td>11111111111</td>
                                                <td>所属1</td>
                                                <td>グループ1</td>
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
