@extends('layouts.base')
@section('content')

    <div class="d-md-flex d-block align-items-center justify-content-between mt-2 page-header-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style2 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">ポータルトップ  </a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">管理画面 </a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">独立系販社一覧  </a></li>
                <li class="breadcrumb-item active" aria-current="page">独立系販社情報 権限編集</li>
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
        独立系販社情報 権限編集
    </div>
    <div class="row">
        <div class="col-xxl-12 col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">会社ID</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="text" class="form-control" id="input-subject" placeholder="11111">
                                    </div>
                                </div>
                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">会社名</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="text" class="form-control" id="input-subject" placeholder="11111">
                                    </div>
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label text-end">略称</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="text" class="form-control" id="input-subject" placeholder="11111">
                                    </div>
                                </div>
                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">代表者名</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="text" class="form-control" id="input-subject" placeholder="Datalizerの●●●●">
                                    </div>
                                </div>
                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">住所</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="text" class="form-control" id="input-subject" placeholder="住所">
                                    </div>
                                </div>
                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">URL</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="text" class="form-control" id="input-subject" placeholder="URL">
                                    </div>
                                </div>

                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">有効開始日</label>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                <input type="text" class="form-control" id="date1" placeholder="Choose date">
                                            </div>
                                        </div>
                                    </div>
                                    <label for="text-area"  class="col-sm-2 col-form-label col-form-label text-end">有効開始日</label>
                                    <div class="col-sm-2 mb-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                                <input type="text" class="form-control" id="date2" placeholder="Choose date">
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-12 row mb-3">
                                    <label for="text-area" class="col-sm-2 col-form-label col-form-label">備考</label>
                                    <div class="col-sm-9 mb-2">
                                        <textarea class="form-control" id="text-area66" rows="1" style="height: 175px;" placeholder="備考"></textarea>
                                    </div>
                                </div>

                                <p>ポータルメニュー制御情報</p>
                                <div class="row">
                                    <div class="col-xl-12 mx-auto">
                                        <div class="card custom-card">
                                            <div class="table-responsive">
                                                <table class="table text-nowrap table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">カテゴリ</th>
                                                            <th scope="col">表示順</th>
                                                            <th scope="col">システム名</th>
                                                            <th scope="col">初期值</th>
                                                            <th scope="col">設定值</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                            <td>15</td>
                                                            <td class="text-start">電話番号</td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>100</td>
                                                            <td class="text-start">件名</td>

                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td><td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>20</td>
                                                            <td class="text-start">関連問い合わせNo.</td>

                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>50</td>
                                                            <td class="text-start">型式</td>

                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select></td>
                                                            <td>20</td>
                                                            <td class="text-start">機番</td>

                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>20</td>
                                                            <td class="text-start">受付No.</td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td><select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>

                                                                </select></td>
                                                            <td>200</td>
                                                            <td class="text-start">本文</td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-select" id="autoSizingSelect">
                                                                    <option selected>文字列(電話番号)</option>
                                                                    <option value="1">文字列(電話番号)</option>
                                                                    <option value="2">文字列(単一行)</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="gap-2 col-3 mx-auto mb-3">
                                            <button class="btn btn-warning px-4" type="button">投稿する</button>
                                        </div>
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
